@extends('layouts.app')

@section('title', 'เพิ่มข้อมูลศูนย์ยุติธรรมชุมชน')

@section('content')
    <main class="flex-1 p-4 lg:p-8 overflow-y-auto pb-32">
        <div class="max-w-4xl mx-auto space-y-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="space-y-2">
                    <h2 class="text-3xl md:text-4xl font-black tracking-tight text-slate-900 dark:text-white">
                        เพิ่มข้อมูลศูนย์ยุติธรรมชุมชน</h2>
                    <p class="text-gray-500 dark:text-text-secondary max-w-lg">
                        กรุณากรอกรายละเอียดข้อมูลในช่องที่มีเครื่องหมาย (*) ให้ครบถ้วน
                    </p>
                </div>
                <div
                    class="bg-white dark:bg-surface-dark p-4 rounded-2xl shadow-sm border border-gray-100 dark:border-surface-border w-full lg:w-72">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-bold text-slate-700 dark:text-white">ลำดับการกรอกข้อมูล</span>
                        <span class="text-xs font-mono text-primary bg-primary/10 px-2 py-0.5 rounded-full">ขั้นตอน
                            1 จาก 3</span>
                    </div>
                    <div class="h-2 w-full bg-gray-100 dark:bg-surface-border rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-[25%] rounded-full shadow-[0_0_10px_rgba(0,122,255,0.5)]">
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-500 dark:text-text-secondary flex justify-between">
                        <span>ข้อมูลทั่วไป</span>
                        <span>ถัดไป: พิกัด</span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <span
                        class="flex items-center justify-center size-8 rounded-full bg-primary text-white font-bold text-sm">1</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">ข้อมูลทั่วไปและสถานที่ตั้ง</h3>
                </div>

                <div
                    class="bg-white dark:bg-surface-dark p-6 lg:p-8 rounded-[2rem] shadow-sm border border-gray-100 dark:border-surface-border grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">รหัสศูนย์ยุติธรรมชุมชน
                            <span class="text-primary">*</span></label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">fingerprint</span>
                            <input
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white font-mono"
                                placeholder="XX-849-22" type="text" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">จังหวัด</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">map</span>
                            <input
                                class="w-full pl-11 pr-4 py-3 bg-gray-100 dark:bg-[#0f1a14] border border-gray-200 dark:border-surface-border rounded-xl text-slate-500 dark:text-gray-400 cursor-not-allowed"
                                type="text" value="กรุงเทพมหานคร" readonly />
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ชื่อศูนย์ยุติธรรมชุมชน
                            <span class="text-primary">*</span></label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">gavel</span>
                            <input
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder-gray-400"
                                placeholder="ระบุชื่อศูนย์ยุติธรรมชุมชน" type="text" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">อำเภอ/เขต <span
                                class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer">
                                <option value="">เลือกอำเภอ/เขต</option>
                                <option>เขตพญาไท</option>
                                <option>เขตจตุจักร</option>
                                <option>เขตราชเทวี</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">expand_more</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ตำบล/แขวง <span
                                class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer">
                                <option value="">เลือกตำบล/แขวง</option>
                                <option>สามเสนใน</option>
                                <option>จอมพล</option>
                                <option>ทุ่งพญาไท</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">expand_more</span>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 space-y-2">
                        <label
                            class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">เขตที่ตั้งศูนย์ยุติธรรมชุมชน<span
                                class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer"
                                id="locationType" onchange="handleLocationTypeChange()">
                                <option value="">เลือกเขตที่ตั้ง</option>
                                <option value="internal">ในสถานที่ทำการ</option>
                                <option value="external">นอกสถานที่ทำการ</option>
                                <option value="other_office">สถานที่ทำการอื่นๆ</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">expand_more</span>
                        </div>
                    </div>

                    <div id="officeTypeContainer" class="col-span-1 md:col-span-2 space-y-2 hidden animate-fade-in">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ประเภทหน่วยงาน
                            (ในสถานที่ทำการ)<span class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-blue-50/50 dark:bg-[#1a2b21] border border-primary/20 dark:border-primary/30 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer"
                                onchange="handleSubSelectChange(this)">
                                <option value="">-- เลือกประเภทหน่วยงาน --</option>
                                <option value="อบต">องค์การบริหารส่วนตำบล</option>
                                <option value="เทศบาลนคร">เทศบาลนคร</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-primary">account_balance</span>
                        </div>
                    </div>

                    <div id="externalTypeContainer" class="col-span-1 md:col-span-2 space-y-2 hidden animate-fade-in">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ประเภทสถานที่
                            (นอกสถานที่ทำการ)<span class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-orange-50/50 dark:bg-[#2b1a12] border border-orange-200 dark:border-orange-500/30 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer"
                                onchange="handleSubSelectChange(this)">
                                <option value="">-- เลือกประเภทสถานที่ --</option>
                                <option value="สถานศึกษา">สถานศึกษา</option>
                                <option value="วัด">วัด</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-orange-500">location_on</span>
                        </div>
                    </div>

                    <div id="otherOfficeTypeContainer" class="col-span-1 md:col-span-2 space-y-2 hidden animate-fade-in">
                        <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ประเภทสถานที่
                            (สถานที่ทำการอื่นๆ)<span class="text-primary">*</span></label>
                        <div class="relative">
                            <select
                                class="w-full pl-4 pr-10 py-3 bg-purple-50/50 dark:bg-[#211a2b] border border-purple-200 dark:border-purple-500/30 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all outline-none text-slate-900 dark:text-white appearance-none cursor-pointer"
                                onchange="handleSubSelectChange(this)">
                                <option value="">-- เลือกประเภทสถานที่ --</option>
                                <option value="ศูนย์ไกลเกลี่ยข้อพิพาท">ศูนย์ไกลเกลี่ยข้อพิพาท</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-purple-500">domain_verification</span>
                        </div>
                    </div>

                    <div id="otherLocationTextContainer" class="col-span-1 md:col-span-2 space-y-2 hidden animate-fade-in">
                        <label
                            class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ระบุรายละเอียดเพิ่มเติม<span
                                class="text-primary">*</span></label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">edit_note</span>
                            <input type="text" id="otherLocationText"
                                class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white"
                                placeholder="กรุณาระบุข้อมูลเพิ่มเติม">
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 pt-4 border-t border-gray-100 dark:border-surface-border">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="space-y-3">
                                <label
                                    class="text-sm font-bold text-slate-700 dark:text-gray-300 ml-1">สถานะการใช้งาน</label>
                                <div class="flex flex-wrap gap-6 mt-1">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="radio" name="operation_status" value="active" class="hidden peer"
                                            checked onchange="toggleReasonField()">
                                        <div
                                            class="size-6 rounded-lg border-2 border-gray-300 dark:border-surface-border peer-checked:border-green-700 peer-checked:bg-green-700 transition-all flex items-center justify-center mr-3">
                                            <span
                                                class="material-symbols-outlined text-white text-sm scale-0 peer-checked:scale-100 transition-transform">check</span>
                                        </div>
                                        <span
                                            class="text-sm text-slate-600 dark:text-gray-400 group-hover:text-green-700 transition-colors">ดำเนินการ</span>
                                    </label>

                                    <label class="flex items-center cursor-pointer group">
                                        <input type="radio" name="operation_status" value="inactive" class="hidden peer"
                                            onchange="toggleReasonField()">
                                        <div
                                            class="size-6 rounded-lg border-2 border-gray-300 dark:border-surface-border peer-checked:border-red-500 peer-checked:bg-red-500 transition-all flex items-center justify-center mr-3">
                                            <span
                                                class="material-symbols-outlined text-white text-sm scale-0 peer-checked:scale-100 transition-transform">close</span>
                                        </div>
                                        <span
                                            class="text-sm text-slate-600 dark:text-gray-400 group-hover:text-red-500 transition-colors">ยกเลิก</span>
                                    </label>
                                </div>
                            </div>

                            <div id="reasonContainer" class="space-y-2 hidden">
                                <label
                                    class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ระบุเหตุผลการยกเลิก
                                    <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <span
                                        class="material-symbols-outlined absolute top-3 left-0 pl-4 flex items-start text-gray-400">info</span>
                                    <textarea
                                        class="w-full pl-11 pr-4 py-2.5 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all outline-none text-slate-900 dark:text-white placeholder-gray-400 min-h-[80px]"
                                        placeholder="กรุณาระบุเหตุผลที่ยกเลิกศูนย์ฯ..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <span
                        class="flex items-center justify-center size-8 rounded-full border-2 border-gray-300 dark:border-surface-border text-gray-400 dark:text-text-secondary font-bold text-sm">2</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">พิกัดที่ตั้ง</h3>
                </div>
                <div
                    class="bg-white dark:bg-surface-dark p-6 lg:p-8 rounded-[2rem] shadow-sm border border-gray-100 dark:border-surface-border">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ละติจูด
                                (Latitude)<span class="text-primary">*</span></label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">location_on</span>
                                <input
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white font-mono"
                                    placeholder="13.7563" type="text" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-700 dark:text-gray-300 ml-1">ลองจิจูด
                                (Longitude)<span class="text-primary">*</span></label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">location_on</span>
                                <input
                                    class="w-full pl-11 pr-4 py-3 bg-gray-50 dark:bg-[#122118] border border-gray-200 dark:border-surface-border rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-slate-900 dark:text-white font-mono"
                                    placeholder="100.5018" type="text" />
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full h-72 rounded-2xl bg-gray-100 dark:bg-[#122118] border border-gray-200 dark:border-surface-border overflow-hidden relative group">
                        <iframe class="w-full h-full grayscale-[0.2] dark:invert-[0.9] dark:hue-rotate-180" frameborder="0"
                            style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                            src="https://maps.google.com/maps?q=13.7563,100.5018&z=15&output=embed">
                        </iframe>
                        <div class="absolute top-4 right-4">
                            <button
                                class="bg-white dark:bg-surface-dark shadow-lg p-2 rounded-full text-primary hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined">my_location</span>
                            </button>
                        </div>
                    </div>
                    <p class="mt-3 text-xs text-gray-500 dark:text-text-secondary flex items-center gap-1 italic">
                        <span class="material-symbols-outlined text-xs">info</span>
                        คลิกที่แผนที่เพื่อปักหมุดหรือระบุพิกัดโดยอัตโนมัติ
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <span
                        class="flex items-center justify-center size-8 rounded-full border-2 border-gray-300 dark:border-surface-border text-gray-400 dark:text-text-secondary font-bold text-sm">3</span>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">เอกสารและไฟล์แนบ</h3>
                </div>
                <div
                    class="bg-white dark:bg-surface-dark p-6 lg:p-8 rounded-[2rem] shadow-sm border border-gray-100 dark:border-surface-border">
                    <div
                        class="border-2 border-dashed border-gray-300 dark:border-surface-border hover:border-primary dark:hover:border-primary rounded-2xl p-10 flex flex-col items-center justify-center text-center transition-all cursor-pointer bg-gray-50 dark:bg-[#122118]/50 group">
                        <div
                            class="bg-primary/10 text-primary p-4 rounded-full mb-4 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl">upload_file</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">เลือกไฟล์เพื่ออัปโหลด</h4>
                        <p class="text-sm text-gray-500 dark:text-text-secondary max-w-xs mx-auto">
                            ลากไฟล์มาวางที่นี่ หรือคลิกเพื่อเลือกไฟล์จากคอมพิวเตอร์ของคุณ
                        </p>
                        <div class="mt-6 flex flex-wrap justify-center gap-2">
                            <span
                                class="px-3 py-1 bg-white dark:bg-surface-dark border border-gray-200 dark:border-surface-border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-wider">PDF</span>
                            <span
                                class="px-3 py-1 bg-white dark:bg-surface-dark border border-gray-200 dark:border-surface-border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-wider">JPG/PNG</span>
                            <span
                                class="px-3 py-1 bg-white dark:bg-surface-dark border border-gray-200 dark:border-surface-border rounded-full text-[10px] font-bold text-gray-400 uppercase tracking-wider">DOCX</span>
                        </div>
                        <input type="file" class="hidden" multiple />
                    </div>

                    <div class="mt-6 space-y-3">
                        <label class="text-sm font-semibold text-slate-700 dark:text-gray-300 ml-1">รายการไฟล์ที่เลือก
                            (1 ไฟล์)</label>
                        <div
                            class="flex items-center justify-between p-3 bg-gray-50 dark:bg-surface-border/30 border border-gray-100 dark:border-surface-border rounded-xl">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-red-500">picture_as_pdf</span>
                                <div class="flex flex-col">
                                    <span
                                        class="text-sm font-medium truncate max-w-[200px] text-slate-900 dark:text-white">เอกสารประกอบ_01.pdf</span>
                                    <span class="text-[10px] text-gray-400">2.4 MB</span>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition-colors">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <div
        class="fixed bottom-0 right-0 left-0 p-4 lg:px-8 lg:py-4 bg-white/90 dark:bg-[#122118]/90 backdrop-blur-md border-t border-gray-200 dark:border-surface-border flex justify-between items-center z-40">
        <button
            class="px-6 py-3 rounded-full text-gray-500 dark:text-text-secondary font-bold text-sm hover:text-slate-900 dark:hover:text-white transition-colors">
            บันทึกร่าง
        </button>
        <div class="flex gap-3">
            <button
                class="px-6 py-3 rounded-full border border-gray-300 dark:border-surface-border text-slate-700 dark:text-white font-bold text-sm hover:bg-gray-100 dark:hover:bg-surface-border transition-colors">
                ล้างฟอร์ม
            </button>
            <button
                class="px-8 py-3 rounded-full bg-primary text-white font-bold text-sm hover:bg-blue-600 transition-all transform hover:scale-105 shadow-lg shadow-primary/25 flex items-center gap-2">
                <span>ยืนยันข้อมูล</span>
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </button>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function handleLocationTypeChange() {
            const locationType = document.getElementById('locationType').value;
            const containers = {
                'internal': document.getElementById('officeTypeContainer'),
                'external': document.getElementById('externalTypeContainer'),
                'other_office': document.getElementById('otherOfficeTypeContainer')
            };
            const otherTextContainer = document.getElementById('otherLocationTextContainer');

            Object.values(containers).forEach(container => {
                container.classList.add('hidden');
                const select = container.querySelector('select');
                if (select) select.value = "";
            });

            otherTextContainer.classList.add('hidden');
            document.getElementById('otherLocationText').value = "";

            if (containers[locationType]) {
                containers[locationType].classList.remove('hidden');
            }
        }

        function handleSubSelectChange(selectElement) {
            const otherTextContainer = document.getElementById('otherLocationTextContainer');
            const textField = document.getElementById('otherLocationText');

            if (selectElement.value === 'อื่นๆ') {
                otherTextContainer.classList.remove('hidden');
            } else {
                otherTextContainer.classList.add('hidden');
                textField.value = "";
            }
        }

        function toggleReasonField() {
            const reasonContainer = document.getElementById('reasonContainer');
            const inactiveStatus = document.querySelector('input[value="inactive"]');

            if (inactiveStatus.checked) {
                reasonContainer.classList.remove('hidden');
                reasonContainer.classList.add('animate-fade-in');
            } else {
                reasonContainer.classList.add('hidden');
            }
        }
    </script>
@endpush