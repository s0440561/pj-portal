@extends('layouts.app')

@section('title', 'หน้าหลัก')

@php
    $activePage = 'home';
@endphp

@section('content')
    <div class="layout-container flex h-full grow flex-col">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-8">
            <div class="layout-content-container flex flex-col w-full max-w-[1200px] gap-8">

                <div
                    class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6 p-6 bg-white rounded-xl shadow-sm border border-slate-100">
                    <div class="flex min-w-72 flex-col gap-3">
                        <h1 class="text-[#101518] text-3xl md:text-4xl font-black leading-tight tracking-[-0.033em]">
                            ยินดีต้อนรับสู่ <span class="text-primary">PJ-Portal</span></h1>
                        <p class="text-[#5e788d] text-base font-normal leading-normal max-w-2xl">
                            ระบบสารสนเทศสำนักงานยุติธรรมจังหวัด ศูนย์กลางข้อมูลและบริการออนไลน์
                            เพื่อการบริหารงานที่โปร่งใสและมีประสิทธิภาพ
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <span
                            class="text-xs font-bold text-primary bg-primary/10 px-3 py-1.5 rounded-full border border-primary/20">v.1.0.2
                            Stable</span>
                    </div>
                </div>

                <div
                    class="grid grid-cols-1 xl:grid-cols-12 gap-5 h-auto xl:h-full content-start max-w-[1820px] mx-auto pb-10 xl:pb-0">

                    <div class="col-span-12 xl:col-span-9 flex flex-col gap-5 h-auto xl:h-full">

                        <a href="#"
                            class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4 p-4 rounded-xl bg-white border-l-4 border-primary text-slate-700 hover:shadow-md transition-all group h-auto sm:h-16 shrink-0 cursor-pointer shadow-sm ring-1 ring-slate-100">
                            <div
                                class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center shrink-0 text-primary shadow-sm">
                                <span class="material-symbols-rounded text-xl animate-pulse">campaign</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-bold truncate w-full text-primary-dark">
                                    แจ้งเตือนรายเดือน</h3>
                                <p class="text-xs opacity-80 line-clamp-1 sm:truncate">มีรายงานข้อมูลกำลังคน 3
                                    ฉบับที่ต้องตรวจสอบและยืนยันภายในสิ้นเดือนนี้</p>
                            </div>
                            <span
                                class="material-symbols-rounded text-lg opacity-50 group-hover:opacity-100 group-hover:text-red-500 hover:bg-red-50 rounded-full p-1 transition-all hidden sm:block">close</span>
                        </a>

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 shrink-0">
                            <h2 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <span class="material-symbols-rounded text-primary text-lg">grid_view</span>
                                System Links
                            </h2>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">groups</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">อัตรากำลัง</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">500</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">directions_car</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">ยานพาหนะ</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">80</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">inventory_2</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">ครุภัณฑ์</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">3,000</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">location_on</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">สถานที่ตั้ง</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">15</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">help</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">ช่องทางติดต่อ</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">10</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">business</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">ข้อมูลหน่วยงาน</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">25</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">groups_2</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">ศูนย์ยุติธรรม</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">150</span>
                                </a>
                                <a href="#"
                                    class="flex flex-col items-center justify-center p-2 rounded-xl border border-slate-100 bg-white hover:shadow-md hover:border-primary/30 hover:-translate-y-1 transition-all group h-24 relative overflow-hidden">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center mb-1 group-hover:scale-110 transition-transform relative z-10">
                                        <span class="material-symbols-rounded text-xl">assignment</span>
                                    </div>
                                    <span
                                        class="text-xs text-slate-500 relative z-10 group-hover:text-primary font-medium">เรื่องร้องเรียน</span>
                                    <span
                                        class="font-display text-lg font-bold text-slate-800 relative z-10 leading-none mt-1">125</span>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row gap-5 h-auto xl:h-[340px] xl:flex-1">

                            <div
                                class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 flex-1 flex flex-col h-full">
                                <div class="flex justify-between items-center mb-4 shrink-0">
                                    <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                        <span class="w-1.5 h-5 bg-primary rounded-full"></span>
                                        ศูนย์ยุติธรรมชุมชน
                                    </h2>
                                    <a href="#" class="text-xs text-primary hover:underline">ดูทั้งหมด</a>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 h-full">
                                    <a href="#"
                                        class="border border-slate-200 rounded-xl p-3 flex flex-col hover:border-primary transition-colors group relative overflow-hidden h-40 sm:h-full">
                                        <div class="flex justify-between items-center mb-2 shrink-0">
                                            <h3 class="text-sm font-bold text-slate-700 group-hover:text-primary">
                                                ที่ตั้ง</h3>
                                            <span
                                                class="material-symbols-rounded text-sm text-slate-400 group-hover:text-primary">open_in_new</span>
                                        </div>
                                        <div class="bg-slate-100 rounded-lg flex-1 w-full relative overflow-hidden">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.760759086123!2d100.5658!3d13.7335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDQ0JzAwLjYiTiAxMDDCsDMzJzU2LjkiRQ!5e0!3m2!1sen!2sth!4v1635741234567!5m2!1sen!2sth"
                                                class="absolute inset-0 w-full h-full border-0 grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500"
                                                allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                        <p class="text-xs text-slate-500 mt-2 truncate flex items-center gap-1 shrink-0">
                                            <span class="material-symbols-rounded text-sm">location_on</span>
                                            อ.เมือง จ.เชียงใหม่
                                        </p>
                                    </a>

                                    <div class="flex flex-col gap-3 h-full overflow-y-auto pr-2 custom-scrollbar">
                                        <h3 class="text-sm font-bold text-slate-700 shrink-0">คณะกรรมการ</h3>
                                        <a href="#"
                                            class="flex items-center gap-3 p-2.5 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors group shrink-0">
                                            <div
                                                class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0">
                                                ส</div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm font-bold text-slate-700 group-hover:text-primary truncate">
                                                    นายสมชาย รักยุติธรรม</p>
                                                <p class="text-xs text-slate-400">ประธานกรรมการ</p>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 p-2.5 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors group shrink-0">
                                            <div
                                                class="w-9 h-9 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-xs font-bold shrink-0">
                                                ว</div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm font-bold text-slate-700 group-hover:text-pink-500 truncate">
                                                    นางสาววารี มีสุข</p>
                                                <p class="text-xs text-slate-400">รองประธาน</p>
                                            </div>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 p-2.5 bg-slate-50 hover:bg-slate-100 rounded-xl transition-colors group shrink-0">
                                            <div
                                                class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold shrink-0">
                                                พ</div>
                                            <div class="min-w-0">
                                                <p
                                                    class="text-sm font-bold text-slate-700 group-hover:text-purple-500 truncate">
                                                    นายพัฒนา ชุมชน</p>
                                                <p class="text-xs text-slate-400">กรรมการ</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 flex-1 flex flex-col h-full">
                                <div class="flex justify-between items-center mb-4 shrink-0">
                                    <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                        <span class="material-symbols-rounded text-primary text-xl">settings_suggest</span>
                                        จัดการข้อมูลระบบ
                                    </h2>
                                </div>

                                <div class="flex flex-col gap-3 h-full overflow-y-auto pr-2 custom-scrollbar">
                                    <div
                                        class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 hover:border-primary/50 transition-colors group shrink-0">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div
                                                class="w-9 h-9 rounded-lg bg-white text-primary flex items-center justify-center shadow-sm shrink-0">
                                                <span class="material-symbols-rounded text-xl">person_add</span>
                                            </div>
                                            <span
                                                class="text-sm font-bold text-slate-700 truncate group-hover:text-primary transition-colors">บุคลากร</span>
                                        </div>
                                        <div class="flex gap-2 shrink-0">
                                            <a href="#"
                                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all"><span
                                                    class="material-symbols-rounded text-base">add</span><span
                                                    class="text-xs font-bold">เพิ่ม</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">edit</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">delete</span></a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 hover:border-primary/50 transition-colors group shrink-0">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div
                                                class="w-9 h-9 rounded-lg bg-white text-primary flex items-center justify-center shadow-sm shrink-0">
                                                <span class="material-symbols-rounded text-xl">directions_car</span>
                                            </div>
                                            <span
                                                class="text-sm font-bold text-slate-700 truncate group-hover:text-primary transition-colors">ยานพาหนะ</span>
                                        </div>
                                        <div class="flex gap-2 shrink-0">
                                            <a href="#"
                                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all"><span
                                                    class="material-symbols-rounded text-base">add</span><span
                                                    class="text-xs font-bold">เพิ่ม</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">edit</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">delete</span></a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 hover:border-primary/50 transition-colors group shrink-0">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div
                                                class="w-9 h-9 rounded-lg bg-white text-primary flex items-center justify-center shadow-sm shrink-0">
                                                <span class="material-symbols-rounded text-xl">inventory_2</span>
                                            </div>
                                            <span
                                                class="text-sm font-bold text-slate-700 truncate group-hover:text-primary transition-colors">ครุภัณฑ์</span>
                                        </div>
                                        <div class="flex gap-2 shrink-0">
                                            <a href="#"
                                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all"><span
                                                    class="material-symbols-rounded text-base">add</span><span
                                                    class="text-xs font-bold">เพิ่ม</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">edit</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">delete</span></a>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-2.5 bg-slate-50 rounded-xl border border-slate-100 hover:border-primary/50 transition-colors group shrink-0">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div
                                                class="w-9 h-9 rounded-lg bg-white text-primary flex items-center justify-center shadow-sm shrink-0">
                                                <span class="material-symbols-rounded text-xl">groups</span>
                                            </div>
                                            <span
                                                class="text-sm font-bold text-slate-700 truncate group-hover:text-primary transition-colors">ศูนย์ยุติธรรม</span>
                                        </div>
                                        <div class="flex gap-2 shrink-0">
                                            <a href="#"
                                                class="flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary/10 text-primary hover:bg-primary hover:text-white transition-all"><span
                                                    class="material-symbols-rounded text-base">add</span><span
                                                    class="text-xs font-bold">เพิ่ม</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-500 hover:bg-slate-200 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">edit</span></a>
                                            <a href="#"
                                                class="p-1.5 rounded-lg bg-slate-100 text-slate-400 hover:bg-red-50 hover:text-red-500 transition-colors"><span
                                                    class="material-symbols-rounded text-lg">delete</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-3 flex flex-col gap-5">

                        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="font-bold text-slate-800">ข้อมูลงบประมาณ</h3>
                                    <p class="text-xs text-slate-400">ปีงบประมาณ 2568</p>
                                </div>
                                <button class="text-primary hover:text-primary-dark transition-colors"><span
                                        class="material-symbols-rounded">account_balance_wallet</span></button>
                            </div>

                            <div class="flex justify-center my-6 relative">
                                <svg class="w-40 h-40 transform -rotate-90">
                                    <circle cx="80" cy="80" r="70" stroke="#f1f5f9" stroke-width="12" fill="transparent" />
                                    <circle cx="80" cy="80" r="70" stroke="url(#budgetGradient)" stroke-width="12"
                                        fill="transparent" stroke-dasharray="440" stroke-dashoffset="110"
                                        class="transition-all duration-1000 ease-out" />
                                    <defs>
                                        <linearGradient id="budgetGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                            <stop offset="0%" stop-color="#137fec" />
                                            <stop offset="100%" stop-color="#42E1F3" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="absolute inset-0 flex flex-col items-center justify-center">
                                    <span class="text-3xl font-bold text-slate-700">75%</span>
                                    <span class="text-xs text-slate-400 font-medium">เบิกจ่ายแล้ว</span>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center border-b border-slate-50 pb-2">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-slate-300"></div>
                                        <span class="text-xs text-slate-500">งบประมาณทั้งหมด</span>
                                    </div>
                                    <span class="text-sm font-bold text-slate-700">10,000,000</span>
                                </div>
                                <div class="flex justify-between items-center border-b border-slate-50 pb-2">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-primary"></div>
                                        <span class="text-xs text-slate-500">เบิกจ่ายแล้ว</span>
                                    </div>
                                    <span class="text-sm font-bold text-primary">7,500,000</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-orange-400"></div>
                                        <span class="text-xs text-slate-500">คงเหลือ</span>
                                    </div>
                                    <span class="text-sm font-bold text-orange-400">2,500,000</span>
                                </div>
                            </div>

                            <div class="mt-6 space-y-3 pt-4 border-t border-slate-100">
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-slate-500">งบบุคลากร</span>
                                        <span class="font-bold text-slate-700">90%</span>
                                    </div>
                                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-primary w-[90%] rounded-full"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-slate-500">งบดำเนินงาน</span>
                                        <span class="font-bold text-slate-700">45%</span>
                                    </div>
                                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-orange-400 w-[45%] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-br from-primary to-primary-dark rounded-xl p-5 shadow-lg text-white flex-1 relative overflow-hidden flex flex-col justify-between">
                            <div class="absolute top-0 right-0 p-4 opacity-10"><span
                                    class="material-symbols-rounded text-8xl">history</span></div>
                            <div>
                                <h3 class="font-bold text-lg mb-4 relative z-10 flex items-center gap-2"><span
                                        class="material-symbols-rounded">update</span> กิจกรรมล่าสุด</h3>
                                <div class="space-y-4 relative z-10">
                                    <div class="flex gap-3 items-start">
                                        <div
                                            class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0 text-sm border border-white/20">
                                            JS</div>
                                        <div>
                                            <p class="text-sm font-medium text-white">สมชาย ลงทะเบียนเข้าใช้งาน
                                            </p>
                                            <p class="text-xs text-white/70">2 นาทีที่แล้ว</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3 items-start">
                                        <div
                                            class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0 text-sm border border-white/20">
                                            <span class="material-symbols-rounded text-sm">upload_file</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-white">อัปโหลดเอกสารหน่วยงาน</p>
                                            <p class="text-xs text-white/70">15 นาทีที่แล้ว</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3 items-start">
                                        <div
                                            class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0 text-sm border border-white/20">
                                            <span class="material-symbols-rounded text-sm">edit</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-white">แก้ไขข้อมูลบุคลากร</p>
                                            <p class="text-xs text-white/70">1 ชั่วโมงที่แล้ว</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="mt-6 w-full py-2 bg-white text-primary font-bold rounded-lg text-sm hover:bg-white/90 transition-colors relative z-10 shadow-sm">ดูประวัติทั้งหมด</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection