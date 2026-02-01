@extends('layouts.app')

@section('title', 'ข้อมูลที่ตั้งหน่วยงาน')

@section('content')
    <div class="layout-container flex justify-center w-full">
        <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center">
            <div class="layout-content-container flex w-full max-w-[1200px] flex-col py-6" x-data="placeManager()">
        <nav class="flex items-center text-sm font-medium text-[#60788a] mb-6">
            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">หน้าหลัก</a>
            <span class="mx-2 text-gray-400">/</span>
            <a class="hover:text-primary transition-colors" href="#">ข้อมูลหน่วยงาน MOJ</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-[#111518]">รายละเอียดสถานที่</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
            <div>
                <h1 class="text-[#111518] text-3xl font-black tracking-tight leading-tight">PJ-Portal
                    แสดงรายละเอียดสถานที่</h1>
                <p class="text-[#60788a] mt-2">จัดการข้อมูลอาคารและสถานที่หน่วยงานในสังกัด</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('place.add') }}"
                    class="flex items-center gap-2 bg-white border border-[#d1d5db] text-[#111518] px-4 py-2.5 rounded-lg text-sm font-bold hover:bg-gray-50 transition shadow-sm cursor-pointer no-underline">
                    <span class="material-symbols-outlined text-lg">add</span>
                    <span>เพิ่มข้อมูลสถานที่</span>
                </a>
            </div>
        </div>

        <div
            class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between mb-6">
            <div class="flex items-center gap-3 bg-blue-50 px-4 py-2 rounded-lg border border-blue-100 w-full md:w-auto">
                <span class="material-symbols-outlined text-primary">location_on</span>
                <div class="flex flex-col">
                    <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider">กำลังแสดงข้อมูลจังหวัด</span>
                    <span class="text-sm font-bold text-[#111518]">เชียงใหม่ (Chiang Mai)</span>
                </div>
            </div>
            <!-- <div class="relative w-full md:max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-symbols-outlined text-[#60788a]">search</span>
                </div>
                <input
                    class="block w-full pl-10 pr-3 py-2.5 border-none bg-[#f0f3f5] rounded-lg text-sm text-[#111518] placeholder-[#60788a] focus:ring-2 focus:ring-primary focus:bg-white transition-all"
                    placeholder="ค้นหาชื่อหน่วยงาน..." type="text" />
            </div> -->
            <div class="flex gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
                <button
                    class="flex items-center px-4 py-2 rounded-lg bg-primary text-white text-sm font-medium whitespace-nowrap shadow-sm">ทั้งหมด</button>
                <button
                    class="flex items-center px-4 py-2 rounded-lg bg-[#f0f3f5] text-[#60788a] hover:bg-[#e1e6e9] hover:text-[#111518] text-sm font-medium whitespace-nowrap transition-colors">อาคารบูรณาการ</button>
                <button
                    class="flex items-center px-4 py-2 rounded-lg bg-[#f0f3f5] text-[#60788a] hover:bg-[#e1e6e9] hover:text-[#111518] text-sm font-medium whitespace-nowrap transition-colors">อาคารเช่า</button>
            </div>
        </div>

        <div class="space-y-6" x-data="{ currentSlide: 0, totalSlides: 1 + history.length }">
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                
                <!-- Header with Carousel Controls -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200 px-5 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-bold"
                                :class="currentSlide === 0 ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700'">
                                <span class="material-symbols-outlined text-sm" x-text="currentSlide === 0 ? 'verified' : 'history'"></span>
                                <span x-text="currentSlide === 0 ? 'ข้อมูลปัจจุบัน' : 'ประวัติการแก้ไข'"></span>
                            </span>
                            <template x-if="currentSlide > 0">
                                <span class="text-xs text-gray-500" x-text="'อัปเดตเมื่อ: ' + history[currentSlide - 1].updated_at"></span>
                            </template>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">
                                <span x-text="currentSlide + 1"></span> / <span x-text="1 + history.length"></span>
                            </span>
                            <div class="flex items-center gap-1">
                                <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : history.length"
                                    class="p-1.5 rounded-lg bg-white border border-gray-200 hover:bg-gray-50 transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-gray-600 text-lg">chevron_left</span>
                                </button>
                                <button @click="currentSlide = currentSlide < history.length ? currentSlide + 1 : 0"
                                    class="p-1.5 rounded-lg bg-white border border-gray-200 hover:bg-gray-50 transition-colors shadow-sm">
                                    <span class="material-symbols-outlined text-gray-600 text-lg">chevron_right</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 0: ข้อมูลปัจจุบัน -->
                <div x-show="currentSlide === 0" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-x-4"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    class="flex flex-col lg:flex-row">
                    
                    <div class="lg:w-[320px] w-full shrink-0 bg-gray-50 p-4 flex flex-col gap-3 border-r border-gray-100">
                        <div class="aspect-[4/3] rounded-lg overflow-hidden relative group shadow-sm">
                            <div class="w-full h-full bg-gray-200 bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAaDTIXanlUG9oZF5g8lMJmb5vC9Y4_nZIrHYwDUjLDWsNyERJ6ajtyQm1S3gS_6FObVYPIyHLs4Wj6iBx_i-O0WOUgnelh6tJU6EIkVBvMVTDGhMxuzB_GmZK6L-SclDuLTrEiG1yAEaJE-kaS0gUlRUvmnrBd106z6cahBxUTaL_MPwCrDuxEUMHhrBaGAOTQq_G9Zbeu4K5kuSdq_lOnGqKFrXqW78lgksUp3sO2zHbWbSYjel6esq7Os8COklOMEhbx8L_KZYI1");'>
                            </div>
                            <div class="absolute top-2 left-2">
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-[10px] font-bold bg-blue-600 text-white shadow-sm">
                                    <span class="material-symbols-outlined text-[14px]">apartment</span>
                                    <span x-text="buildingTypeLabel(currentData.type)"></span>
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <div class="aspect-square rounded bg-gray-300 bg-center bg-cover cursor-pointer hover:opacity-80 transition"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAh-Z3E2qPdXLkiGxuxuWobda6vGfI2YpdpIgLtvxw2K_yshNxi5RRsE_TX7BYFwTSDnwQXG5Sx5E_euszCzGW5MpJofx9_htAlO2Z1vGuriauWlaTSYaJVDW5HyYRrtm3au_qXG6oVvG36ona-BGu7glEoR4QnS3S5ql_Icb9wzxDBJdGVIB-5Xn9tJfY7jcyQ1EiYXVPIhPdqMiH9BExnwAicykTV_MNRJqkUS7gWZQFISsMVvYXtZap4svX_5lgkV-Z-aaWrhRVD");'>
                            </div>
                            <div class="aspect-square rounded bg-gray-300 bg-center bg-cover cursor-pointer hover:opacity-80 transition"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAzFVWxR-D-hveOOTP1MY6I_0t1rmkGhkwbp7PfOG0mRZRVgUtDXkAkdc2E7H3-9W4_2NlFZmgD-adi8evdZBpsoCMRjM70o5CA1dqBMNcMKfqI4XuC84nAe4M7dfihOlIaCuZC92xd1-C0mZ_MEyukZXy9rJubHO82Kulxgpo3QbU7hgRep4EP5bnFPMHr8Wa9-wmL1Qo33MNitz4pxylRSjIQHRp0qAI-DS6u8eNVDbHAkM5IWH-fRif0lTdvsx8hs5bakas0oiTd");'>
                            </div>
                            <div class="aspect-square rounded bg-gray-300 bg-center bg-cover cursor-pointer hover:opacity-80 transition"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDo1hzYwzqKP8sXT9YYut8RZkJXnn1UcyGWyXGeZpvxNW45PG10J7NKvovaSPOlVw-jyJQJxDZz1R91l6GvT0-1mFszg5WiNUu4dxTBp07FCwXLnBero2pBE2NPOXQgemP-CS5tc60MdNArH_6-ZbE9qacsD3sSvsZwXEx0w5CsywhYfBrQZIIkeOnRgS329ZX-uRIgz-XXDh9rpjpHvpBH6wR2O3pvYbybXlT4PDFOMQO0Zn_w29XAZV9mywasOffek8kOXPWzt1Fy");'>
                            </div>
                            <div
                                class="aspect-square rounded bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold cursor-pointer hover:bg-gray-300 transition">
                                +5</div>
                        </div>
                    </div>

                    <div class="flex-1 p-5 flex flex-col gap-5">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-[#111518] leading-tight" x-text="currentData.name"></h3>
                                <div class="mt-1.5 flex flex-wrap gap-2">
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-medium text-gray-600 bg-gray-100 px-2 py-1 rounded border border-gray-200">
                                        <span class="material-symbols-outlined text-[14px]">map</span>
                                        <span>พิกัด: <span x-text="currentData.lat"></span>, <span
                                                x-text="currentData.long"></span></span>
                                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 text-xs font-medium text-green-700 bg-green-50 px-2 py-1 rounded border border-green-200">
                                        <span class="size-1.5 bg-green-500 rounded-full"></span> <span
                                            x-text="currentData.status"></span>
                                    </span>
                                </div>
                            </div>
                            <button
                                class="flex items-center gap-1.5 text-primary hover:bg-blue-50 px-3 py-1.5 rounded-lg transition-colors text-sm font-bold border border-transparent hover:border-blue-100"
                                onclick="toggleModal('editHistoryModal')">
                                <span class="material-symbols-outlined text-lg">edit_square</span>
                                แก้ไข/แจ้งซ่อม
                            </button>
                        </div>

                        <div class="h-px bg-gray-100"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                            <div class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-gray-400 mt-0.5">location_on</span>
                                <p>
                                    เลขที่ <span class="font-semibold" x-text="currentData.address.number"></span>
                                    หมู่ <span class="font-semibold" x-text="currentData.address.moo"></span>
                                    ซอย <span class="font-semibold" x-text="currentData.address.soi"></span>
                                    ถนน <span class="font-semibold" x-text="currentData.address.road"></span>
                                    <br>
                                    ต.<span class="font-semibold" x-text="currentData.address.subdist"></span>
                                    อ.<span class="font-semibold" x-text="currentData.address.dist"></span>
                                    จ.<span class="font-semibold" x-text="currentData.address.prov"></span>
                                    <span class="font-semibold" x-text="currentData.address.zip"></span>
                                </p>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-gray-400 mt-0.5">history</span>
                                <p>
                                    พื้นที่เดิม: <span class="font-semibold" x-text="currentData.prev_use || '-'"></span>
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 gap-y-4">
                                <div>
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">พื้นที่ใช้สอย</span>
                                    <p class="text-sm font-semibold text-[#111518]"><span x-text="currentData.area"></span>
                                        ตรม.</p>
                                </div>
                                <div>
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">จำนวนชั้น</span>
                                    <p class="text-sm font-semibold text-[#111518]"><span x-text="currentData.floors"></span>
                                        ชั้น</p>
                                </div>
                                <div>
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">ปีที่สร้าง
                                        / เริ่มใช้</span>
                                    <p class="text-sm font-semibold text-[#111518]"><span x-text="currentData.year"></span>
                                        / <span x-text="currentData.year_start"></span></p>
                                </div>
                                <div>
                                    <span
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">วันรับประกัน</span>
                                    <p class="text-sm font-semibold text-[#111518]" x-text="currentData.warranty_date"></p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div x-show="currentData.type === 'integrated' || currentData.type === 'own'"
                                class="flex flex-wrap gap-4">
                                <div class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 bg-white">
                                    <span class="material-symbols-outlined text-orange-500">storefront</span>
                                    <span class="text-sm">ร้านค้าสวัสดิการ: <span class="font-bold"
                                            x-text="currentData.welfare ? 'มี' : 'ไม่มี'"></span></span>
                                </div>
                                <div class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 bg-white">
                                    <span class="material-symbols-outlined text-blue-500">home</span>
                                    <span class="text-sm">บ้านพัก/แฟลต:
                                        <span class="font-bold" x-show="currentData.housing">มี (<span
                                                x-text="currentData.housing_type"></span> <span
                                                x-text="currentData.housing_count"></span> ยูนิต)</span>
                                        <span class="font-bold" x-show="!currentData.housing">ไม่มี</span>
                                    </span>
                                </div>
                            </div>

                            <div x-show="currentData.type === 'rent'"
                                class="bg-orange-50 rounded-xl p-3 border border-orange-100 flex items-center gap-4">
                                <div>
                                    <span class="text-[10px] font-bold text-orange-800 uppercase block">ค่าเช่า/เดือน</span>
                                    <span class="text-sm font-bold text-[#111518]"><span
                                            x-text="formatCurrency(currentData.rent_cost)"></span> บาท</span>
                                </div>
                                <div class="h-8 w-px bg-orange-200"></div>
                                <div>
                                    <span class="text-[10px] font-bold text-orange-800 uppercase block">สัญญาเช่า</span>
                                    <span class="text-sm font-bold text-[#111518]" x-text="currentData.rent_contract"></span>
                                </div>
                            </div>

                            <div x-show="currentData.type === 'gov'" class="bg-blue-50 rounded-xl p-3 border border-blue-100">
                                <span class="text-[10px] font-bold text-blue-800 uppercase block">หน่วยงานเจ้าของพื้นที่</span>
                                <span class="text-sm font-bold text-[#111518]" x-text="currentData.gov_owner"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slides 1+: ประวัติการแก้ไข -->
                <template x-for="(item, index) in history" :key="index">
                    <div x-show="currentSlide === index + 1" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform translate-x-4"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        class="flex flex-col lg:flex-row">
                        
                        <div class="lg:w-[320px] w-full shrink-0 bg-gray-50 p-4 flex flex-col gap-3 border-r border-gray-100">
                            <div class="aspect-[4/3] rounded-lg overflow-hidden relative group shadow-sm bg-gray-200 flex items-center justify-center">
                                <div class="text-center">
                                    <span class="material-symbols-outlined text-gray-400 text-5xl">photo_library</span>
                                    <p class="text-gray-500 text-sm mt-2">ข้อมูลจากประวัติ</p>
                                </div>
                                <div class="absolute top-2 left-2">
                                    <span
                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-md text-[10px] font-bold bg-orange-500 text-white shadow-sm">
                                        <span class="material-symbols-outlined text-[14px]">history</span>
                                        <span x-text="'V' + (history.length - index)"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg p-3 border border-gray-200">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <span class="material-symbols-outlined text-lg">event</span>
                                    <span class="text-sm font-medium" x-text="'บันทึกเมื่อ: ' + item.updated_at"></span>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 p-5 flex flex-col gap-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-[#111518] leading-tight" x-text="item.name"></h3>
                                    <div class="mt-1.5 flex flex-wrap gap-2">
                                        <span
                                            class="inline-flex items-center gap-1 text-xs font-medium text-orange-700 bg-orange-50 px-2 py-1 rounded border border-orange-200">
                                            <span class="material-symbols-outlined text-[14px]">apartment</span>
                                            <span x-text="buildingTypeLabel(item.type)"></span>
                                        </span>
                                        <span
                                            class="inline-flex items-center gap-1 text-xs font-medium text-green-700 bg-green-50 px-2 py-1 rounded border border-green-200">
                                            <span class="size-1.5 bg-green-500 rounded-full"></span> <span
                                                x-text="item.status"></span>
                                        </span>
                                    </div>
                                </div>
                                <span class="bg-gray-100 px-3 py-1.5 rounded-lg text-xs font-bold text-gray-500">
                                    ข้อมูลย้อนหลัง
                                </span>
                            </div>

                            <div class="h-px bg-gray-100"></div>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 gap-y-4">
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">พื้นที่ใช้สอย</span>
                                        <p class="text-sm font-semibold text-[#111518]"><span x-text="item.area"></span>
                                            ตรม.</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">จำนวนชั้น</span>
                                        <p class="text-sm font-semibold text-[#111518]"><span x-text="item.floors || '-'"></span>
                                            ชั้น</p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">ปีที่สร้าง</span>
                                        <p class="text-sm font-semibold text-[#111518]"><span x-text="item.year || '-'"></span></p>
                                    </div>
                                    <div>
                                        <span
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">สถานะ</span>
                                        <p class="text-sm font-semibold text-[#111518]" x-text="item.status"></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div x-show="item.type === 'integrated' || item.type === 'own'"
                                    class="flex flex-wrap gap-4">
                                    <div class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 bg-white">
                                        <span class="material-symbols-outlined text-orange-500">storefront</span>
                                        <span class="text-sm">ร้านค้าสวัสดิการ: <span class="font-bold"
                                                x-text="item.welfare ? 'มี' : 'ไม่มี'"></span></span>
                                    </div>
                                    <div class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-200 bg-white">
                                        <span class="material-symbols-outlined text-blue-500">home</span>
                                        <span class="text-sm">บ้านพัก/แฟลต:
                                            <span class="font-bold" x-show="item.housing">มี (<span
                                                    x-text="item.housing_type"></span> <span
                                                    x-text="item.housing_count"></span> ยูนิต)</span>
                                            <span class="font-bold" x-show="!item.housing">ไม่มี</span>
                                        </span>
                                    </div>
                                </div>

                                <div x-show="item.type === 'rent'"
                                    class="bg-orange-50 rounded-xl p-3 border border-orange-100 flex items-center gap-4">
                                    <div>
                                        <span class="text-[10px] font-bold text-orange-800 uppercase block">ค่าเช่า/เดือน</span>
                                        <span class="text-sm font-bold text-[#111518]"><span
                                                x-text="formatCurrency(item.rent_cost)"></span> บาท</span>
                                    </div>
                                    <div class="h-8 w-px bg-orange-200"></div>
                                    <div>
                                        <span class="text-[10px] font-bold text-orange-800 uppercase block">สัญญาเช่า</span>
                                        <span class="text-sm font-bold text-[#111518]" x-text="item.rent_contract || '-'"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- เปรียบเทียบกับข้อมูลปัจจุบัน -->
                            <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="material-symbols-outlined text-blue-600">compare_arrows</span>
                                    <span class="text-sm font-bold text-blue-700">เปรียบเทียบกับข้อมูลปัจจุบัน</span>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-xs">
                                    <div x-show="item.area !== currentData.area">
                                        <span class="text-blue-600 font-bold">พื้นที่:</span>
                                        <span class="text-gray-600"><span x-text="item.area"></span> → <span x-text="currentData.area"></span> ตรม.</span>
                                    </div>
                                    <div x-show="item.floors !== currentData.floors">
                                        <span class="text-blue-600 font-bold">ชั้น:</span>
                                        <span class="text-gray-600"><span x-text="item.floors"></span> → <span x-text="currentData.floors"></span></span>
                                    </div>
                                    <div x-show="item.status !== currentData.status">
                                        <span class="text-blue-600 font-bold">สถานะ:</span>
                                        <span class="text-gray-600"><span x-text="item.status"></span> → <span x-text="currentData.status"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Slide Indicators (ด้านล่าง) -->
                <div class="bg-gray-50 border-t border-gray-200 px-5 py-3">
                    <div class="flex items-center justify-center gap-2">
                        <template x-for="n in (1 + history.length)" :key="n">
                            <button @click="currentSlide = n - 1"
                                class="transition-all rounded-full"
                                :class="currentSlide === n - 1 ? 'w-6 h-2 bg-primary' : 'w-2 h-2 bg-gray-300 hover:bg-gray-400'">
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center py-6">
            <nav class="flex items-center gap-1">
                <button class="p-2 rounded hover:bg-gray-100 text-gray-500 disabled:opacity-50">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button class="px-3 py-1 rounded bg-primary text-white text-sm font-bold shadow-sm">1</button>
                <button class="p-2 rounded hover:bg-gray-100 text-gray-500">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </nav>
        </div>

        <!-- Edit History Modal -->
        <div aria-labelledby="modal-title" aria-modal="true" class="relative z-[100] hidden" id="editHistoryModal"
            role="dialog">
            <div class="fixed inset-0 bg-gray-900/75 transition-opacity backdrop-blur-sm"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-hidden">
                <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                    <div
                        class="relative flex flex-col w-full max-w-5xl max-h-[95vh] transform rounded-xl bg-white text-left shadow-2xl transition-all border border-gray-200">

                        <div class="shrink-0 bg-white border-b border-gray-200 rounded-t-xl">
                            <div class="flex justify-between items-start px-6 pt-5 pb-0">
                                <div>
                                    <h3 class="text-xl font-bold text-[#111518]">จัดการข้อมูลสถานที่</h3>
                                    <p class="text-sm text-gray-500 mt-1">PJ-Portal: <span x-text="currentData.name"></span>
                                    </p>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600 transition-colors p-1"
                                    onclick="toggleModal('editHistoryModal')" type="button">
                                    <span class="material-symbols-outlined text-2xl">close</span>
                                </button>
                            </div>

                            <div class="flex px-6 mt-4 gap-6">
                                <button @click="activeTab = 'info'"
                                    class="pb-3 text-sm font-bold border-b-[3px] transition-colors flex items-center gap-2"
                                    :class="activeTab === 'info' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700'">
                                    <span class="material-symbols-outlined text-lg">edit_note</span> ข้อมูลและประวัติแก้ไข
                                </button>
                                <button @click="activeTab = 'maintenance'"
                                    class="pb-3 text-sm font-bold border-b-[3px] transition-colors flex items-center gap-2"
                                    :class="activeTab === 'maintenance' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700'">
                                    <span class="material-symbols-outlined text-lg">handyman</span> ประวัติการซ่อมบำรุง
                                </button>
                            </div>
                        </div>

                        <div class="flex-1 overflow-y-auto px-4 py-5 sm:p-6 bg-[#f8fafc] custom-scrollbar">

                            <div x-show="activeTab === 'info'" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">

                                <div class="bg-white p-5 rounded-2xl border-2 border-primary/20 shadow-md relative mb-8">
                                    <div
                                        class="absolute -top-3 left-4 bg-primary text-white px-3 py-0.5 rounded-full text-xs font-bold shadow-sm flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">edit</span> ข้อมูลปัจจุบัน
                                        (แก้ไขได้)
                                    </div>

                                    <form>
                                        <h4 class="text-sm font-bold text-[#111518] mb-3 border-b pb-1 mt-2">ข้อมูลทั่วไป
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                                            <div class="col-span-2 md:col-span-2"><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">ชื่อสถานที่</label><input
                                                    x-model="editForm.name"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">เลขที่</label><input
                                                    x-model="editForm.address.number"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">หมู่ที่</label><input
                                                    x-model="editForm.address.moo"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label class="block text-xs font-bold text-gray-700 mb-1">ถนน</label><input
                                                    x-model="editForm.address.road"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">ตำบล</label><input
                                                    x-model="editForm.address.subdist"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">อำเภอ</label><input
                                                    x-model="editForm.address.dist"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                            <div><label
                                                    class="block text-xs font-bold text-gray-700 mb-1">จังหวัด</label><input
                                                    x-model="editForm.address.prov"
                                                    class="block w-full rounded-md border-gray-300 focus:border-primary focus:ring-primary text-sm"
                                                    type="text" /></div>
                                        </div>

                                        <h4 class="text-sm font-bold text-[#111518] mb-3 border-b pb-1">ประเภทอาคาร</h4>
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6">
                                            <label
                                                class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border transition-all"
                                                :class="editForm.type === 'integrated' ? 'bg-blue-50 border-primary text-primary' : 'bg-white border-gray-200 hover:bg-gray-50'">
                                                <input type="radio" x-model="editForm.type" value="integrated"
                                                    class="text-primary focus:ring-primary"><span
                                                    class="text-xs font-bold">อาคารบูรณาการ</span>
                                            </label>
                                            <label
                                                class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border transition-all"
                                                :class="editForm.type === 'own' ? 'bg-blue-50 border-primary text-primary' : 'bg-white border-gray-200 hover:bg-gray-50'">
                                                <input type="radio" x-model="editForm.type" value="own"
                                                    class="text-primary focus:ring-primary"><span
                                                    class="text-xs font-bold">อาคารตนเอง</span>
                                            </label>
                                            <label
                                                class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border transition-all"
                                                :class="editForm.type === 'rent' ? 'bg-blue-50 border-primary text-primary' : 'bg-white border-gray-200 hover:bg-gray-50'">
                                                <input type="radio" x-model="editForm.type" value="rent"
                                                    class="text-primary focus:ring-primary"><span
                                                    class="text-xs font-bold">อาคารเช่า</span>
                                            </label>
                                            <label
                                                class="flex items-center gap-2 cursor-pointer px-3 py-2 rounded-lg border transition-all"
                                                :class="editForm.type === 'gov' ? 'bg-blue-50 border-primary text-primary' : 'bg-white border-gray-200 hover:bg-gray-50'">
                                                <input type="radio" x-model="editForm.type" value="gov"
                                                    class="text-primary focus:ring-primary"><span
                                                    class="text-xs font-bold">อาคารส่วนราชการ</span>
                                            </label>
                                        </div>

                                        <div class="bg-gray-50/80 p-4 rounded-xl border border-gray-200 transition-all">

                                            <div x-show="editForm.type === 'integrated' || editForm.type === 'own'">
                                                <h5 class="text-xs font-bold text-gray-500 uppercase mb-3">รายละเอียด</h5>
                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                                                    <div><label class="block text-xs font-bold text-gray-700 mb-1">พื้นที่
                                                            (ตร.ม.)</label><input x-model="editForm.area"
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="number" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">จำนวนชั้น</label><input
                                                            x-model="editForm.floors"
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="number" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">ปีที่สร้าง</label><input
                                                            x-model="editForm.year"
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="text" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">สถานะ</label>
                                                        <select x-model="editForm.status"
                                                            class="block w-full rounded-md border-gray-300 text-sm">
                                                            <option>ใช้งานปกติ</option>
                                                            <option>ซ่อมแซม</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label
                                                    class="block text-xs font-bold text-gray-700 mb-2">ข้อมูลเพิ่มเติม</label>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <label class="flex items-center gap-2"><input type="checkbox"
                                                            x-model="editForm.welfare" class="rounded text-primary">
                                                        ร้านค้าสวัสดิการ</label>
                                                    <div class="flex items-center gap-2">
                                                        <input type="checkbox" x-model="editForm.housing"
                                                            class="rounded text-primary">
                                                        <span>บ้านพัก/แฟลต</span>
                                                        <input x-show="editForm.housing" x-model="editForm.housing_count"
                                                            type="number"
                                                            class="w-16 h-8 rounded border-gray-300 text-xs ml-2"
                                                            placeholder="จำนวน">
                                                        <select x-show="editForm.housing" x-model="editForm.housing_type"
                                                            class="h-8 rounded border-gray-300 text-xs">
                                                            <option>บ้านพัก</option>
                                                            <option>แฟลต</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div x-show="editForm.type === 'rent'">
                                                <h5 class="text-xs font-bold text-gray-500 uppercase mb-3">รายละเอียดการเช่า
                                                </h5>
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">พื้นที่เช่า
                                                            (ตร.ม.)</label><input
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="number" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">ค่าเช่า/เดือน</label><input
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="number" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">สัญญาเช่า</label><input
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="text" /></div>
                                                </div>
                                            </div>

                                            <div x-show="editForm.type === 'gov'">
                                                <h5 class="text-xs font-bold text-gray-500 uppercase mb-3">
                                                    รายละเอียดหน่วยงานราชการ</h5>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">ชื่อหน่วยงานเจ้าของ</label><input
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="text" /></div>
                                                    <div><label
                                                            class="block text-xs font-bold text-gray-700 mb-1">พื้นที่ใช้สอย
                                                            (ตร.ม.)</label><input
                                                            class="block w-full rounded-md border-gray-300 text-sm"
                                                            type="number" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div x-show="activeTab === 'maintenance'" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-lg font-bold text-[#111518]"
                                        x-text="showMaintenanceForm ? 'บันทึกการซ่อมบำรุง' : 'รายการประวัติการซ่อม'"></h4>
                                    <button @click="showMaintenanceForm = !showMaintenanceForm"
                                        class="text-sm font-bold px-4 py-2 rounded-lg transition-colors flex items-center gap-2"
                                        :class="showMaintenanceForm ? 'bg-gray-200 text-gray-700 hover:bg-gray-300' : 'bg-orange-500 text-white hover:bg-orange-600 shadow-sm'">
                                        <span class="material-symbols-outlined text-lg"
                                            x-text="showMaintenanceForm ? 'arrow_back' : 'add'"></span>
                                        <span x-text="showMaintenanceForm ? 'ย้อนกลับ' : 'แจ้งซ่อมใหม่'"></span>
                                    </button>
                                </div>

                                <div x-show="!showMaintenanceForm">
                                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">
                                                        วันที่ซ่อม</th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">
                                                        รายการ</th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase">
                                                        งบประมาณ</th>
                                                    <th
                                                        class="px-4 py-3 text-right text-xs font-bold text-gray-500 uppercase">
                                                        จำนวนเงิน (บาท)</th>
                                                    <th
                                                        class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase">
                                                        เอกสาร</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                <template x-for="(m, index) in maintenanceHistory" :key="index">
                                                    <tr class="hover:bg-gray-50 transition-colors">
                                                        <td class="px-4 py-3 text-sm text-gray-900" x-text="m.date"></td>
                                                        <td class="px-4 py-3 text-sm font-medium text-gray-900"
                                                            x-text="m.item"></td>
                                                        <td class="px-4 py-3 text-sm text-gray-600">
                                                            <span class="block" x-text="budgetTypeLabel(m.type)"></span>
                                                            <span class="text-xs text-gray-400">ปี <span
                                                                    x-text="m.year"></span></span>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm text-right font-bold text-primary"
                                                            x-text="formatCurrency(m.cost)"></td>
                                                        <td class="px-4 py-3 text-center">
                                                            <template x-if="m.fileUrl">
                                                                <a :href="m.fileUrl" target="_blank"
                                                                    class="text-primary hover:text-blue-700 transition-colors tooltip-trigger"
                                                                    :title="m.fileName">
                                                                    <span class="material-symbols-outlined text-lg"
                                                                        x-text="getFileIcon(m.fileType)"></span>
                                                                </a>
                                                            </template>
                                                            <template x-if="!m.fileUrl">
                                                                <span class="text-gray-300">-</span>
                                                            </template>
                                                        </td>
                                                    </tr>
                                                </template>
                                                <tr x-show="maintenanceHistory.length === 0">
                                                    <td colspan="5" class="px-4 py-8 text-center text-gray-400">
                                                        ยังไม่มีประวัติการซ่อม</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div x-show="showMaintenanceForm"
                                    class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div class="col-span-2"><label
                                                class="block text-sm font-bold text-gray-700 mb-1">รายการที่ซ่อม
                                                *</label><input x-model="newMaintenance.item"
                                                class="block w-full rounded-md border-gray-300 text-sm py-2.5"
                                                type="text" /></div>
                                        <div><label
                                                class="block text-sm font-bold text-gray-700 mb-1">วันที่ซ่อม</label><input
                                                x-model="newMaintenance.date"
                                                class="block w-full rounded-md border-gray-300 text-sm py-2.5"
                                                type="date" /></div>
                                        <div><label
                                                class="block text-sm font-bold text-gray-700 mb-1">จำนวนเงิน</label><input
                                                x-model="newMaintenance.cost"
                                                class="block w-full rounded-md border-gray-300 text-sm py-2.5 text-right"
                                                type="number" /></div>
                                        <div><label
                                                class="block text-sm font-bold text-gray-700 mb-1">ปีงบประมาณ</label><input
                                                x-model="newMaintenance.year"
                                                class="block w-full rounded-md border-gray-300 text-sm py-2.5"
                                                type="number" /></div>
                                        <div><label
                                                class="block text-sm font-bold text-gray-700 mb-1">ประเภทงบประมาณ</label>
                                            <select x-model="newMaintenance.type"
                                                class="block w-full rounded-md border-gray-300 text-sm py-2.5">
                                                <option value="1">งบดำเนินงาน</option>
                                                <option value="2">งบดอกเบี้ย</option>
                                                <option value="3">งบกลาง</option>
                                                <option value="4">อื่นๆ</option>
                                            </select>
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block text-sm font-bold text-gray-700 mb-1">เอกสารอ้างอิง</label>
                                            <input
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer"
                                                type="file" accept=".jpg,.jpeg,.png,.pdf"
                                                @change="handleFileUpload($event)" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="shrink-0 bg-gray-50 px-4 py-4 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-200 rounded-b-xl gap-3">
                            <button x-show="activeTab === 'info'" @click="saveEdit()"
                                class="inline-flex w-full justify-center rounded-lg bg-primary px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-blue-700 sm:w-auto transition-colors">บันทึกการแก้ไข</button>
                            <button x-show="activeTab === 'maintenance' && showMaintenanceForm" @click="saveMaintenance()"
                                class="inline-flex w-full justify-center rounded-lg bg-orange-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-orange-600 sm:w-auto transition-colors">บันทึกรายการซ่อม</button>
                            <button
                                class="mt-3 sm:mt-0 inline-flex w-full justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-auto transition-colors"
                                onclick="toggleModal('editHistoryModal')">ปิดหน้าต่าง</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function placeManager() {
            return {
                activeTab: 'info',
                showMaintenanceForm: false,
                // เพิ่มข้อมูลให้ครบถ้วนเพื่อแสดงใน Card
                currentData: {
                    name: 'สำนักงานยุติธรรมจังหวัดเชียงใหม่',
                    address: {
                        number: '456', moo: '1', soi: '-', road: 'โชตนา',
                        subdist: 'ช้างเผือก', dist: 'เมืองเชียงใหม่', prov: 'เชียงใหม่', zip: '50300'
                    },
                    lat: '18.8392', long: '98.9745',
                    type: 'integrated',
                    area: 4500,
                    floors: 4,
                    year: 2562,
                    year_start: 2562,
                    warranty_date: '31/12/2567',
                    prev_use: 'ที่ดินราชพัสดุ (เดิมเรือนจำ)',
                    status: 'ใช้งานปกติ',
                    welfare: true,
                    housing: true,
                    housing_type: 'แฟลต',
                    housing_count: 26,
                    rent_cost: null, // For Rent type
                    rent_contract: null // For Rent type
                },
                editForm: {},
                history: [
                    {
                        name: 'สำนักงานยุติธรรมจังหวัดเชียงใหม่ (เดิม)',
                        address: { number: '456' },
                        type: 'integrated',
                        area: 4000,
                        floors: 4,
                        year: 2562,
                        status: 'อยู่ระหว่างซ่อมแซม',
                        welfare: true,
                        housing: true,
                        housing_type: 'บ้านพัก',
                        housing_count: 5,
                        updated_at: '25 ธ.ค. 2566'
                    }
                ],
                maintenanceHistory: [],
                newMaintenance: { item: '', date: '', cost: '', year: '', type: '1', file: null, fileName: null, fileUrl: null, fileType: null },

                init() { this.editForm = JSON.parse(JSON.stringify(this.currentData)); },

                saveEdit() {
                    let snapshot = JSON.parse(JSON.stringify(this.currentData));
                    let date = new Date();
                    snapshot.updated_at = date.toLocaleDateString('th-TH', { day: 'numeric', month: 'short', year: 'numeric' });
                    this.history.unshift(snapshot);
                    this.currentData = JSON.parse(JSON.stringify(this.editForm));
                    toggleModal('editHistoryModal');
                },

                handleFileUpload(e) {
                    const file = e.target.files[0];
                    if (file) {
                        this.newMaintenance.file = file;
                        this.newMaintenance.fileName = file.name;
                        this.newMaintenance.fileType = file.type;
                    }
                },
                saveMaintenance() {
                    if (!this.newMaintenance.item) return alert('กรุณาระบุรายการ');
                    if (this.newMaintenance.file) {
                        this.newMaintenance.fileUrl = URL.createObjectURL(this.newMaintenance.file);
                    }
                    this.maintenanceHistory.unshift({ ...this.newMaintenance });
                    this.newMaintenance = { item: '', date: '', cost: '', year: '', type: '1', file: null, fileName: null, fileUrl: null, fileType: null };
                    const fileInput = document.querySelector('input[type="file"]');
                    if (fileInput) fileInput.value = '';
                    this.showMaintenanceForm = false;
                },
                getFileIcon(mimeType) {
                    if (mimeType && mimeType.includes('pdf')) return 'picture_as_pdf';
                    if (mimeType && mimeType.includes('image')) return 'image';
                    return 'description';
                },
                buildingTypeLabel(type) {
                    const map = { 'integrated': 'อาคารบูรณาการ', 'own': 'อาคารตนเอง', 'rent': 'อาคารเช่า', 'gov': 'อาคารส่วนราชการ' };
                    return map[type] || type;
                },
                budgetTypeLabel(type) {
                    const map = { '1': 'งบดำเนินงาน', '2': 'งบดอกเบี้ย', '3': 'งบกลาง', '4': 'อื่นๆ' };
                    return map[type] || type;
                },
                formatCurrency(value) { return value ? new Intl.NumberFormat('th-TH', { minimumFractionDigits: 2 }).format(value) : '-'; }
            }
        }

        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            if (modal) {
                if (modal.classList.contains('hidden')) {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    const alpineData = document.querySelector('[x-data]').__x.$data;
                    alpineData.editForm = JSON.parse(JSON.stringify(alpineData.currentData));
                } else {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            }
        }
    </script>
@endpush
