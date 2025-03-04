<div x-show="isReportModalOpen" class="report-modal">
    <div x-ref="report" class="report-absolute">
        <div class="report-wrapper">
            <div class="close-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
                <span>Báo cáo truyện</span>
            </div>
            <div class="title">Tại sao bạn lại báo cáo truyện này?</div>
            <div class="report-form">
                <form>
                    <div class="mb-2">
                        <label class="flex items-center">
                            <input type="radio" name="reason" class="form-radio text-green-500" />
                            <span class="ml-2">Nội dung không phù hợp</span>
                        </label>
                    </div>
                    <div class="mb-2">
                        <label class="flex items-center">
                            <input type="radio" name="reason" class="form-radio text-green-500" />
                            <span class="ml-2">Vi phạm bản quyền</span>
                        </label>
                    </div>
                    <div class="mb-2">
                        <label class="flex items-center">
                            <input type="radio" name="reason" class="form-radio text-green-500" />
                            <span class="ml-2">Đánh giá sai</span>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="radio" name="reason" class="form-radio text-green-500" />
                            <span class="ml-2">Lý do khác</span>
                        </label>
                    </div>
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg">Báo cáo</button>
                </form>
            </div>
        </div>
    </div>
    <div @click="closeReportModal()" class="overlay"></div>
</div>