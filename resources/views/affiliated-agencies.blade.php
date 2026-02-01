@extends('layouts.app')

@section('title', 'PJ-Office แสดงหน่วยงานในสังกัด')

@section('content')
    <div class="min-h-screen flex flex-col relative" x-data="affiliatedAgenciesApp()">

        {{-- Modal --}}
        <div class="fixed inset-0 z-[100] bg-slate-900/50 backdrop-blur-sm transition-opacity duration-300 items-center justify-center p-4 overflow-y-auto"
            id="addAgencyModal">
            <div
                class="bg-white dark:bg-surface-dark rounded-2xl shadow-2xl w-full max-w-lg transform scale-100 transition-transform duration-300 overflow-hidden border border-slate-100 dark:border-slate-700 my-auto">
                <div class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-700">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-50 dark:bg-primary/20 p-2 rounded-lg text-primary">
                            <span class="material-symbols-outlined" x-text="isEditing ? 'edit' : 'storefront'"></span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white"
                            x-text="isEditing ? 'แก้ไขข้อมูลหน่วยงาน' : 'เพิ่มหน่วยงานใหม่'"></h3>
                    </div>
                    <a class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors" href="#">
                        <span class="material-symbols-outlined">close</span>
                    </a>
                </div>
                <div class="p-6 space-y-6 max-h-[75vh] overflow-y-auto custom-scrollbar">
                    <div
                        class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-4 flex items-start gap-3 text-blue-800 dark:text-blue-200 text-sm">
                        <span class="material-symbols-outlined text-blue-600 dark:text-blue-400 mt-0.5 shrink-0">info</span>
                        <p class="leading-relaxed">กรุณาระบุข้อมูลให้ครบถ้วน เพื่อความถูกต้องในการเชื่อมโยงข้อมูลระบบ SSO
                        </p>
                    </div>
                    <div class="space-y-5">
                        <div class="space-y-1.5">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">ประเภทหน่วยงาน (กรม)
                                <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined">domain</span></div>
                                <select x-model="formData.deptType"
                                    class="block w-full pl-10 pr-10 py-2.5 text-base border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary rounded-xl dark:bg-slate-800 dark:text-white appearance-none cursor-pointer hover:border-primary/50 transition-colors shadow-sm">
                                    <option disabled="" value="">เลือกกรมสังกัด</option>
                                    <option value="1">กรมคุมประพฤติ</option>
                                    <option value="2">กรมคุ้มครองสิทธิและเสรีภาพ</option>
                                    <option value="3">กรมบังคับคดี</option>
                                    <option value="4">กรมพินิจและคุ้มครองเด็กและเยาวชน</option>
                                    <option value="5">กรมราชทัณฑ์</option>
                                    <option value="6">กรมสอบสวนคดีพิเศษ</option>
                                    <option value="7">สถาบันนิติวิทยาศาสตร์</option>
                                    <option value="8">สำนักงานกิจการยุติธรรม</option>
                                    <option value="9">สำนักงานป.ป.ส.</option>
                                    <option value="10">สำนักงานปลัดกระทรวงยุติธรรม</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined">expand_more</span></div>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">ชื่อหน่วยงาน <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined text-[20px]">edit_note</span></div>
                                <input x-model="formData.name"
                                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-white dark:bg-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary dark:text-white transition-shadow shadow-sm"
                                    placeholder="ระบุชื่อหน่วยงาน" type="text" />
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">เบอร์โทรศัพท์</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined text-[20px]">call</span></div>
                                <input x-model="formData.phone"
                                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-white dark:bg-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary dark:text-white transition-shadow shadow-sm"
                                    placeholder="ระบุเบอร์โทรศัพท์" type="tel" />
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">ที่อยู่</label>
                            <div class="relative">
                                <div class="absolute top-3 left-3 flex items-start pointer-events-none text-slate-400"><span
                                        class="material-symbols-outlined text-[20px]">location_on</span></div>
                                <textarea x-model="formData.address"
                                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-white dark:bg-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary dark:text-white transition-shadow shadow-sm resize-none h-24"
                                    placeholder="ระบุที่อยู่หน่วยงาน..."></textarea>
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-bold text-slate-700 dark:text-slate-300">ตำแหน่งที่ตั้ง
                                (ปักหมุดแผนที่)</label>
                            <div class="space-y-3">
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <span class="material-symbols-outlined text-[20px]">search</span></div>
                                    <input
                                        class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-white dark:bg-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary dark:text-white transition-shadow shadow-sm"
                                        placeholder="ค้นหาสถานที่เพื่อปักหมุด..." type="text" />
                                </div>
                                <div
                                    class="relative w-full h-48 bg-slate-100 dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-600 overflow-hidden group cursor-crosshair">
                                    <div class="absolute inset-0 opacity-10"
                                        style="background-image: radial-gradient(#94a3b8 1px, transparent 1px); background-size: 20px 20px;">
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                        <div class="relative -mt-8">
                                            <span
                                                class="material-symbols-outlined text-4xl text-red-500 drop-shadow-md animate-bounce">location_on</span>
                                            <div class="w-4 h-1 bg-black/20 rounded-full blur-[2px] mx-auto mt-[-5px]">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute bottom-2 right-2 bg-white/90 dark:bg-slate-900/90 px-2 py-1 rounded text-[10px] text-slate-500 border border-slate-200 shadow-sm pointer-events-none">
                                        เลื่อนแผนที่เพื่อระบุพิกัด</div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="relative flex-1">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center text-xs font-bold text-slate-400">Lat:</span>
                                        <input x-model="formData.lat"
                                            class="block w-full pl-10 pr-3 py-2 border border-slate-200 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-900 text-slate-600 text-sm focus:outline-none cursor-default"
                                            placeholder="18.790..." type="text" />
                                    </div>
                                    <div class="relative flex-1">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center text-xs font-bold text-slate-400">Long:</span>
                                        <input x-model="formData.long"
                                            class="block w-full pl-12 pr-3 py-2 border border-slate-200 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-900 text-slate-600 text-sm focus:outline-none cursor-default"
                                            placeholder="98.985..." type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 flex justify-end gap-3 border-t border-slate-100 dark:border-slate-700">
                    <a class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors text-sm"
                        href="#">ยกเลิก</a>
                    <button
                        class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/20 text-sm flex items-center gap-2"><span
                            class="material-symbols-outlined text-[18px]">save</span> บันทึก</button>
                </div>
            </div>
            <a class="absolute inset-0 -z-10 cursor-default" href="#"></a>
        </div>

        {{-- Main Content --}}
        <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
            <div x-show="currentView === 'list'" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold bg-blue-100 text-primary dark:bg-blue-900/40 dark:text-blue-200">
                                <span class="material-symbols-outlined text-[14px] mr-1">location_on</span>
                                พื้นที่: จังหวัดเชียงใหม่
                            </span>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight mb-2">
                            แสดงหน่วยงานในสังกัด</h2>
                        <p class="text-slate-500 dark:text-slate-400 text-lg">จัดการข้อมูลหน่วยงานในกระทรวงยุติธรรม
                            (เฉพาะภายในจังหวัด)</p>
                    </div>
                    <a @click.prevent="openAddModal()"
                        class="group flex items-center justify-center gap-2 bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-200 transform hover:-translate-y-0.5 cursor-pointer no-underline">
                        <span class="material-symbols-outlined group-hover:rotate-90 transition-transform">add_circle</span>
                        <span class="font-bold">เพิ่มหน่วยงานใหม่</span>
                    </a>
                </div>

                <div
                    class="bg-white dark:bg-surface-dark rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 mt-8">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-end">
                        <div class="lg:col-span-7 space-y-2">
                            <label
                                class="block text-sm font-semibold text-slate-700 dark:text-slate-300">ประเภทหน่วยงาน</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined">domain</span></div>
                                <select
                                    class="block w-full pl-10 pr-10 py-3 text-base border-slate-200 dark:border-slate-600 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary sm:text-sm rounded-xl dark:bg-slate-800 dark:text-white appearance-none cursor-pointer hover:border-primary/50 transition-colors">
                                    <option value="">ทั้งหมด (All Departments)</option>
                                    <option value="1">กรมคุมประพฤติ</option>
                                    <option value="2">กรมคุ้มครองสิทธิและเสรีภาพ</option>
                                    <option value="3">กรมบังคับคดี</option>
                                    <option value="4">กรมพินิจและคุ้มครองเด็กและเยาวชน</option>
                                    <option value="5">กรมราชทัณฑ์</option>
                                    <option value="6">กรมสอบสวนคดีพิเศษ</option>
                                    <option value="7">สถาบันนิติวิทยาศาสตร์</option>
                                    <option value="8">สำนักงานกิจการยุติธรรม</option>
                                    <option value="9">สำนักงานป.ป.ส.</option>
                                    <option value="10">สำนักงานปลัดกระทรวงยุติธรรม</option>
                                </select>
                                <div
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                                    <span class="material-symbols-outlined">expand_more</span></div>
                            </div>
                        </div>
                        <div class="lg:col-span-5 space-y-2">
                            <label
                                class="block text-sm font-semibold text-slate-700 dark:text-slate-300">ค้นหาชื่อหน่วยงาน</label>
                            <div class="relative">
                                <input
                                    class="block w-full pl-10 pr-3 py-3 border border-slate-200 dark:border-slate-600 rounded-xl leading-5 bg-white dark:bg-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary sm:text-sm dark:text-white transition-shadow"
                                    placeholder="พิมพ์ชื่อหน่วยงานที่ต้องการค้นหา..." type="text" />
                                <div
                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-primary">
                                    <span class="material-symbols-outlined">search</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 mt-8">
                    <template x-for="i in 15">
                        <div
                            class="group bg-white dark:bg-surface-dark rounded-xl p-3 border border-slate-200 dark:border-slate-700 hover:border-primary/50 dark:hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-300 relative overflow-hidden">
                            <div
                                class="absolute top-0 right-0 p-2 opacity-0 group-hover:opacity-100 transition-opacity flex gap-1 bg-white/90 dark:bg-slate-900/90 rounded-bl-lg z-10">
                                <button
                                    @click.prevent="openEditModal({ deptType: '10', name: 'สำนักงานยุติธรรมจังหวัดเชียงใหม่ ' + i, phone: '053-112-' + (700+i), address: 'ศาลากลางจังหวัดเชียงใหม่ ' + i, lat: '18.8407', long: '98.9700' })"
                                    class="p-1 text-slate-400 hover:text-primary hover:bg-blue-50 rounded transition-colors"><span
                                        class="material-symbols-outlined text-lg">edit</span></button>
                                <button
                                    class="p-1 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded transition-colors"><span
                                        class="material-symbols-outlined text-lg">delete</span></button>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-slate-800 flex items-center justify-center overflow-hidden border border-blue-100 dark:border-slate-700">
                                        <span class="material-symbols-outlined text-xl text-primary">account_balance</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-1 mb-0.5"><span
                                            class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-green-100 text-green-800">Active</span><span
                                            class="text-[10px] text-slate-400" x-text="'ID: 100'+i"></span></div>
                                    <h3 class="text-sm font-bold text-slate-900 dark:text-white truncate"
                                        x-text="'สยจ. เชียงใหม่ ' + i"></h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 truncate">สป.ยธ.</p>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800 grid grid-cols-2 gap-2">
                                <div>
                                    <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">โทรศัพท์</p>
                                    <p class="text-xs font-semibold text-slate-700 dark:text-slate-300"
                                        x-text="'053-112-' + (700+i)"></p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">จังหวัด</p>
                                    <p class="text-xs font-semibold text-slate-700 dark:text-slate-300">เชียงใหม่</p>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <a @click.prevent="viewDetails({name: 'สำนักงานยุติธรรมจังหวัดเชียงใหม่ ' + i, dept: 'สำนักงานปลัดกระทรวงยุติธรรม', tel: '053-112-' + (700+i), id: '100'+i, icon: 'account_balance', color: 'blue'})"
                                    class="text-xs font-medium text-primary hover:text-blue-700 flex items-center gap-1 cursor-pointer">ดูรายละเอียด
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span></a>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div x-show="currentView === 'detail'" x-cloak x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="flex items-center gap-4 mb-6">
                    <button @click="currentView = 'list'"
                        class="flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 transition-colors font-bold shadow-sm">
                        <span class="material-symbols-outlined text-lg">arrow_back</span> ย้อนกลับ
                    </button>
                    <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">รายละเอียดหน่วยงาน</h2>
                </div>
                <div
                    class="bg-white dark:bg-surface-dark rounded-2xl shadow-md border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="relative bg-slate-100 h-48 dark:bg-slate-800">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/50 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 flex items-end gap-5 w-full">
                            <div
                                class="w-24 h-24 rounded-2xl bg-white dark:bg-slate-800 shadow-lg p-4 flex items-center justify-center relative z-10">
                                <span class="material-symbols-outlined text-5xl"
                                    :class="`text-${selectedAgency?.color || 'blue'}-600`"
                                    x-text="selectedAgency?.icon || 'storefront'"></span>
                            </div>
                            <div class="mb-2 text-white relative z-10">
                                <h1 class="text-3xl font-black tracking-tight leading-tight" x-text="selectedAgency?.name">
                                </h1>
                                <p class="text-blue-100 text-lg opacity-90" x-text="selectedAgency?.dept"></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex flex-wrap gap-4 mb-8">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800"><span
                                    class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> สถานะ: ปกติ (Active)</span>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-slate-100 text-slate-600 border border-slate-200"><span
                                    class="material-symbols-outlined text-sm mr-1">fingerprint</span> ID: <span
                                    x-text="selectedAgency?.id"></span></span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="md:col-span-2 space-y-8">
                                <div>
                                    <h3
                                        class="text-lg font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-primary">info</span> ข้อมูลทั่วไป</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div
                                            class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 sm:col-span-2">
                                            <span class="text-xs font-bold text-slate-400 uppercase">ชื่อหน่วยงาน</span>
                                            <p class="text-lg font-semibold text-slate-800 dark:text-white mt-1"
                                                x-text="selectedAgency?.name"></p>
                                        </div>
                                        <div
                                            class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 sm:col-span-2">
                                            <span class="text-xs font-bold text-slate-400 uppercase">ประเภทหน่วยงาน
                                                (กรม)</span>
                                            <p class="text-lg font-semibold text-slate-800 dark:text-white mt-1"
                                                x-text="selectedAgency?.dept"></p>
                                        </div>
                                        <div
                                            class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                            <span class="text-xs font-bold text-slate-400 uppercase">เบอร์โทรศัพท์</span>
                                            <p class="text-lg font-semibold text-slate-800 dark:text-white mt-1"
                                                x-text="selectedAgency?.tel"></p>
                                        </div>
                                        <div
                                            class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                            <span class="text-xs font-bold text-slate-400 uppercase">โทรสาร (Fax)</span>
                                            <p class="text-lg font-semibold text-slate-800 dark:text-white mt-1">-</p>
                                        </div>
                                        <div
                                            class="p-4 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700 col-span-1 sm:col-span-2">
                                            <span class="text-xs font-bold text-slate-400 uppercase">ที่อยู่</span>
                                            <p class="text-base font-medium text-slate-800 dark:text-white mt-1">
                                                ศาลากลางจังหวัดเชียงใหม่ ถนนโชตนา ตำบลช้างเผือก อำเภอเมือง จังหวัดเชียงใหม่
                                                50300</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-1">
                                <div
                                    class="bg-slate-50 dark:bg-slate-800 rounded-xl p-1 h-64 border border-slate-200 dark:border-slate-700">
                                    <div
                                        class="w-full h-full bg-slate-200 rounded-lg flex items-center justify-center flex-col text-slate-400">
                                        <span class="material-symbols-outlined text-4xl">map</span><span
                                            class="text-xs mt-2 font-semibold">Map Placeholder</span></div>
                                </div>
                                <button
                                    class="w-full mt-4 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 font-bold hover:bg-slate-50 transition-colors shadow-sm flex items-center justify-center gap-2"><span
                                        class="material-symbols-outlined text-primary">directions</span> นำทาง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('styles')
    <style>
        #addAgencyModal:not(:target) {
            display: none;
            opacity: 0;
            pointer-events: none;
        }

        #addAgencyModal:target {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function affiliatedAgenciesApp() {
            return {
                currentView: 'list',
                selectedAgency: null,
                isEditing: false,
                formData: { deptType: '', name: '', phone: '', address: '', lat: '', long: '' },
                viewDetails(data) {
                    this.selectedAgency = data;
                    this.currentView = 'detail';
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                openAddModal() {
                    this.isEditing = false;
                    this.formData = { deptType: '', name: '', phone: '', address: '', lat: '', long: '' };
                    window.location.hash = 'addAgencyModal';
                },
                openEditModal(data) {
                    this.isEditing = true;
                    this.formData = {
                        deptType: data.deptType, name: data.name, phone: data.phone,
                        address: data.address || '', lat: data.lat || '', long: data.long || ''
                    };
                    window.location.hash = 'addAgencyModal';
                }
            }
        }
    </script>
@endpush