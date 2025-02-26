<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class RatingService
{
	/**
	 * Đảm bảo điểm không vượt quá giá trị tối đa (5).
	 *
	 * @param float $rating
	 * @return float
	 */
	private function enforceMaxRating(float $rating): float
	{
		return min($rating, 5);
	}

	/**
	 * Tính điểm trung bình mới khi thêm một review.
	 *
	 * @param Model $model
	 * @param float $newRating
	 * @return float
	 */
	public function getRating(Model $model, float $newRating): float
	{
		$ratingCount = $model->rating_count;
		$newAverage = ($model->rating * $ratingCount + $newRating) / ($ratingCount + 1);
		return round($this->enforceMaxRating($newAverage), 1);
	}

	/**
	 * Cập nhật lại điểm trung bình khi một review được chỉnh sửa.
	 * Số lượng review không thay đổi.
	 *
	 * @param Model $model
	 * @param float $oldRating
	 * @param float $newRating
	 * @return float
	 */
	public function updateRating(Model $model, float $oldRating, float $newRating): float
	{
		$newRating = min($newRating, 5);
		$ratingCount = $model->rating_count;

		if ($ratingCount <= 0) {
			return 0;
		}

		$totalRating = $model->rating * $ratingCount;
		$totalRating = $totalRating - $oldRating + $newRating;
		$newAverage = round($totalRating / $ratingCount, 1);
		$newAverage = $this->enforceMaxRating($newAverage);

		$model->rating = $newAverage;
		$model->save();

		return $newAverage;
	}

	/**
	 * Xóa một review và cập nhật lại điểm trung bình.
	 *
	 * @param Model $model
	 * @param float $ratingToRemove
	 * @return float
	 */
	public function removeRating(Model $model, float $ratingToRemove): float
	{
		$oldCount = $model->rating_count;

		if ($oldCount <= 0) {
			return 0;
		}

		$newCount = $oldCount - 1;
		if ($newCount == 0) {
			$newAverage = 0;
		} else {
			$newAverage = ($model->rating * $oldCount - $ratingToRemove) / $newCount;
			$newAverage = round($newAverage, 1);
			$newAverage = $this->enforceMaxRating($newAverage);
		}

		$model->rating = $newAverage;
		$model->rating_count = $newCount;
		$model->save();

		return $newAverage;
	}
}
