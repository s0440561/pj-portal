<header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[#f0f3f5] shadow-sm">
    <div class="layout-container flex justify-center w-full">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex w-full max-w-[1200px] flex-col">
                <div class="flex items-center justify-between py-3">
                    <div class="flex items-center gap-4 text-[#101518]">
                        <a href="{{ route('home') }}"
                            class="size-10 flex items-center justify-center rounded-lg bg-primary/10 text-primary hover:opacity-80 transition-opacity">
                            <span class="material-symbols-rounded text-[28px]">account_balance</span>
                        </a>
                        <div class="flex flex-col">
                            <h2 class="text-primary text-xl font-black leading-tight tracking-[-0.015em]"><a
                                    href="{{ route('home') }}">PJ-Portal</a></h2>
                            <span class="text-xs text-slate-500 font-medium">สำนักงานยุติธรรมจังหวัด</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-6">
                        <div class="bg-center bg-no-repeat bg-cover rounded-full size-10 ring-2 ring-white shadow-sm cursor-pointer hover:ring-primary/20 transition-all bg-slate-200"
                            data-alt="User profile placeholder"
                            style='background-image: url("https://ui-avatars.com/api/?name=Admin&background=137fec&color=fff");'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>