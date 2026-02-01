@extends('layouts.app')

@section('title', 'Training Supervision')

@section('content')
    <div class="bg-background-light flex-grow flex flex-col items-center justify-start p-4 md:p-8">
        <div
            class="w-full max-w-[900px] bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden flex flex-col">

            <div class="p-5 md:p-8 md:pb-6 border-b border-slate-100 bg-white">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-100 shrink-0">
                            <span class="material-symbols-outlined text-xl md:text-2xl">assignment</span>
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold text-slate-900 tracking-tight">
                                บันทึกข้อมูลการนิเทศ</h1>
                            <p class="text-slate-500 text-xs md:text-sm">
                                กรอกรายละเอียดการลงพื้นที่นิเทศศูนย์ยุติธรรมชุมชน</p>
                        </div>
                    </div>
                    <div
                        class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 border border-slate-100 text-slate-600 text-xs md:text-sm font-medium whitespace-nowrap">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        ปีงบประมาณ 2569
                    </div>
                </div>
            </div>

            <div class="p-5 md:px-8 md:py-8">
                <form class="flex flex-col gap-6">

                    <div class="flex flex-col gap-2">
                        <label class="text-slate-700 text-sm font-semibold">รายชื่อศูนย์ยุติธรรมชุมชนที่รับการนิเทศ</label>
                        <div class="relative">
                            <select
                                class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 pr-10 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all cursor-pointer shadow-sm text-sm md:text-base">
                                <option value="" disabled selected>เลือกรายชื่อศูนย์ยุติธรรมชุมชน...</option>
                                <option value="center_01">ศูนย์ยุติธรรมชุมชนตำบลแม่สอด</option>
                                <option value="center_02">ศูนย์ยุติธรรมชุมชนตำบลปากน้ำ</option>
                                <option value="center_03">ศูนย์ยุติธรรมชุมชนตำบลในเมือง</option>
                                <option value="center_04">ศูนย์ยุติธรรมชุมชนตำบลหัวเวียง</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-4 top-3.5 text-slate-400 pointer-events-none">location_on</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">จำนวนคณะกรรมการเข้าร่วมนิเทศ</label>
                            <div class="relative group">
                                <input
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm text-sm md:text-base"
                                    min="0" placeholder="0" type="number" />
                                <span
                                    class="material-symbols-outlined absolute right-4 top-3.5 text-slate-400">groups</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">วันที่ทำรายการ</label>
                            <div class="relative group">
                                <input
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm text-sm md:text-base"
                                    type="date" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">งบประมาณที่ใช้</label>
                            <div class="relative">
                                <select id="budget-status"
                                    class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 pr-10 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all cursor-pointer shadow-sm text-sm md:text-base">
                                    <option value="use_budget" selected>ใช้งบประมาณ</option>
                                    <option value="no_budget">ไม่ใช้งบประมาณ</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-4 top-3.5 text-slate-400 pointer-events-none">expand_more</span>
                            </div>
                        </div>
                        <div id="amount-container" class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">จำนวนเงิน</label>
                            <div class="relative flex items-center">
                                <div class="absolute left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-slate-500 font-bold text-lg">฿</span>
                                </div>
                                <input
                                    class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-10 pr-4 py-3 text-lg font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm"
                                    placeholder="0.00" type="number" step="0.01" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">รูปแบบการนิเทศ</label>
                            <div class="relative">
                                <select id="supervision-mode"
                                    class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 pr-10 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all cursor-pointer shadow-sm text-sm md:text-base">
                                    <option disabled="" selected="" value="">เลือกรูปแบบ</option>
                                    <option value="onsite">ลงพื้นที่</option>
                                    <option value="online">ประชุมเชิงปฏิบัติการ</option>
                                    <option value="other">อื่นๆ</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-4 top-3.5 text-slate-400 pointer-events-none">expand_more</span>
                            </div>
                        </div>

                        <div id="other-detail-container" class="flex flex-col gap-2 hidden">
                            <label class="text-slate-700 text-sm font-semibold">โปรดระบุรายละเอียด</label>
                            <input type="text" name="other_detail" placeholder="ระบุรูปแบบการนิเทศ..."
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all shadow-sm text-sm md:text-base">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">ความต้องการป้ายศูนย์ฯ</label>
                            <div class="relative">
                                <select id="sign-requirement" onchange="toggleSignAction()"
                                    class="w-full appearance-none bg-white border border-slate-200 rounded-lg px-4 py-3 pr-10 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all shadow-sm text-sm md:text-base">
                                    <option value="not-needed" selected>ไม่ต้องการ</option>
                                    <option value="needed">ต้องการ</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-4 top-3.5 text-slate-400 pointer-events-none">branding_watermark</span>
                            </div>
                        </div>

                        <div id="sign-action-container" class="flex flex-col gap-2" style="display: none;">
                            <label class="text-slate-700 text-sm font-semibold text-blue-700">ระบุประเภทการดำเนินการ</label>
                            <div class="relative">
                                <select id="sign-action"
                                    class="w-full appearance-none bg-white border-2 border-blue-200 rounded-lg px-4 py-3 pr-10 text-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all shadow-sm text-sm md:text-base">
                                    <option value="replace">เปลี่ยนแปลง (เปลี่ยนป้ายใหม่)</option>
                                    <option value="repair">ซ่อมแซม (ซ่อมแซมป้ายเดิม)</option>
                                </select>
                                <span
                                    class="material-symbols-outlined absolute right-4 top-3.5 text-blue-500 pointer-events-none">build</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-slate-700 text-sm font-semibold">ปัญหาอุปสรรคในการจัดนิเทศ</label>
                        <textarea
                            class="w-full min-h-[80px] bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all shadow-sm text-sm md:text-base"
                            placeholder="ระบุปัญหาหรืออุปสรรคที่พบ..."></textarea>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-slate-700 text-sm font-semibold">แนวทางแก้ไขปัญหา</label>
                        <textarea
                            class="w-full min-h-[80px] bg-slate-50 border border-slate-200 rounded-lg px-4 py-3 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all shadow-sm text-sm md:text-base"
                            placeholder="ระบุแนวทางหรือวิธีการแก้ไขปัญหา..."></textarea>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-slate-700 text-sm font-semibold">แนบไฟล์ประกอบ</label>
                        <label
                            class="flex flex-col items-center justify-center w-full h-24 border-2 border-slate-200 border-dashed rounded-xl cursor-pointer bg-slate-50 hover:bg-blue-50 hover:border-blue-300 transition-all duration-300">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-slate-400">cloud_upload</span>
                                <span class="text-sm text-slate-600">คลิกเพื่ออัปโหลดไฟล์ (PDF, JPG, PNG)</span>
                            </div>
                            <input class="hidden" type="file" />
                        </label>
                    </div>

                    <div
                        class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 pt-6 border-t border-slate-100">
                        <button type="button"
                            class="w-full sm:w-auto px-6 py-3 rounded-xl text-slate-500 font-medium hover:bg-slate-100 transition-colors text-sm md:text-base">
                            ยกเลิก
                        </button>
                        <button type="submit"
                            class="w-full sm:w-auto px-10 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold shadow-lg shadow-blue-200 transition-all transform active:scale-95 flex items-center justify-center gap-2 text-sm md:text-base">
                            <span class="material-symbols-outlined text-xl">save</span>
                            บันทึกข้อมูล
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const budgetStatus = document.getElementById('budget-status');
        const amountContainer = document.getElementById('amount-container');
        const amountInput = amountContainer.querySelector('input');

        budgetStatus.addEventListener('change', function () {
            if (this.value === 'no_budget') {
                amountContainer.style.opacity = '0.4';
                amountInput.disabled = true;
                amountInput.value = '0';
            } else {
                amountContainer.style.opacity = '1';
                amountInput.disabled = false;
                amountInput.value = '';
            }
        });
    </script>
    <script>
        const selectMode = document.getElementById('supervision-mode');
        const otherDetailContainer = document.getElementById('other-detail-container');

        selectMode.addEventListener('change', function () {
            if (this.value === 'other') {
                otherDetailContainer.classList.remove('hidden');
            } else {
                otherDetailContainer.classList.add('hidden');
            }
        });
    </script>

    <script>
        function toggleSignAction() {
            const requirement = document.getElementById('sign-requirement').value;
            const actionContainer = document.getElementById('sign-action-container');

            if (requirement === 'needed') {
                actionContainer.style.display = 'flex';
            } else {
                actionContainer.style.display = 'none';
            }
        }
    </script>
@endpush