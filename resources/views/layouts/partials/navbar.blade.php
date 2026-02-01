<nav class="bg-white border-b border-[#dae1e7] relative z-40">
    <div class="layout-container flex justify-center w-full">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex w-full max-w-[1200px] flex-col">
                <div class="flex gap-1 overflow-visible flex-wrap lg:flex-nowrap justify-start">
                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'home' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="{{ route('home') }}">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'home' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">home</span>
                        <p
                            class="{{ $activePage == 'home' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            หน้าหลัก</p>
                    </a>
                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'user' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="{{ route('user') }}">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'user' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">badge</span>
                        <p
                            class="{{ $activePage == 'user' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            บุคลากร</p>
                    </a>
                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'power-rate' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="{{ route('power-rate') }}">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'power-rate' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">groups</span>
                        <p
                            class="{{ $activePage == 'power-rate' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            ข้อมูลอัตรากำลัง</p>
                    </a>
                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'vehicle' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="{{ route('vehicle') }}">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'vehicle' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">directions_car</span>
                        <p
                            class="{{ $activePage == 'vehicle' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            ยานพาหนะ</p>
                    </a>
                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'asset' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="#">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'asset' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">inventory_2</span>
                        <p
                            class="{{ $activePage == 'asset' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            ครุภัณฑ์</p>
                    </a>

                    <div class="relative group flex flex-col justify-end">
                        <a class="flex items-center justify-center border-b-[3px] {{ in_array($activePage, ['place', 'affiliated-agencies']) ? 'border-b-primary' : 'border-b-transparent' }} px-4 py-4 group-hover:border-b-slate-300 group-hover:bg-slate-50 transition-colors cursor-pointer"
                            href="#">
                            <span
                                class="material-symbols-rounded mr-2 {{ in_array($activePage, ['place', 'affiliated-agencies']) ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">domain</span>
                            <p
                                class="{{ in_array($activePage, ['place', 'affiliated-agencies']) ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                                ข้อมูลหน่วยงาน</p>
                            <span class="material-symbols-rounded ml-1 text-slate-400 text-[16px]">expand_more</span>
                        </a>
                        <div
                            class="absolute top-full left-0 mt-0 w-64 bg-white border border-slate-200 rounded-b-lg shadow-lg hidden group-hover:block z-50">
                            <a class="flex items-center px-4 py-3 hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors group/item"
                                href="{{ route('place') }}">
                                <span
                                    class="material-symbols-rounded mr-3 text-slate-400 group-hover/item:text-primary text-[18px]">location_on</span>
                                <span class="text-slate-700 text-sm font-medium">ข้อมูลที่ตั้งหน่วยงาน</span>
                            </a>
                            <a class="flex items-center px-4 py-3 hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors group/item"
                                href="{{ route('affiliated-agencies') }}">
                                <span
                                    class="material-symbols-rounded mr-3 text-slate-400 group-hover/item:text-primary text-[18px]">other_houses</span>
                                <span class="text-slate-700 text-sm font-medium">หน่วยงานในสังกัด</span>
                            </a>
                        </div>
                    </div>

                    <div class="relative group flex flex-col justify-end">
                        <a class="flex items-center justify-center border-b-[3px] {{ in_array($activePage, ['justice-center', 'training']) ? 'border-b-primary' : 'border-b-transparent' }} px-4 py-4 group-hover:border-b-slate-300 group-hover:bg-slate-50 transition-colors cursor-pointer"
                            href="#">
                            <span
                                class="material-symbols-rounded mr-2 {{ in_array($activePage, ['justice-center', 'training']) ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">handshake</span>
                            <p
                                class="{{ in_array($activePage, ['justice-center', 'training']) ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                                ยุติธรรมชุมชน</p>
                            <span class="material-symbols-rounded ml-1 text-slate-400 text-[16px]">expand_more</span>
                        </a>
                        <div
                            class="absolute top-full left-0 mt-0 w-72 bg-white border border-slate-200 rounded-b-lg shadow-lg hidden group-hover:block z-50">
                            <a class="flex items-center px-4 py-3 hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors group/item"
                                href="{{ route('justice-center') }}">
                                <span
                                    class="material-symbols-rounded mr-3 text-slate-400 group-hover/item:text-primary text-[18px]">add_location_alt</span>
                                <span class="text-slate-700 text-sm font-medium">แสดงศูนย์ยุติธรรมชุมชน</span>
                            </a>
                            <!-- <a class="flex items-center px-4 py-3 hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors group/item"
                                href="{{ route('training') }}">
                                <span
                                    class="material-symbols-rounded mr-3 text-slate-400 group-hover/item:text-primary text-[18px]">model_training</span>
                                <span class="text-slate-700 text-sm font-medium">ฝึกอบรม/นิเทศ</span>
                            </a> -->
                        </div>
                    </div>

                    <a class="group flex items-center justify-center border-b-[3px] {{ $activePage == 'contact' ? 'border-b-primary' : 'border-b-transparent hover:border-b-slate-300' }} px-4 py-4 hover:bg-slate-50 transition-colors"
                        href="{{ route('contact') }}">
                        <span
                            class="material-symbols-rounded mr-2 {{ $activePage == 'contact' ? 'text-primary' : 'text-slate-500 group-hover:text-primary' }} text-[20px]">contact_support</span>
                        <p
                            class="{{ $activePage == 'contact' ? 'text-primary' : 'text-[#5e788d] group-hover:text-primary' }} text-sm font-bold leading-normal tracking-[0.015em]">
                            ช่องทางการติดต่อ</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>