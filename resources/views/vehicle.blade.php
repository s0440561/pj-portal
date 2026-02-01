@extends('layouts.app')

@section('title', 'PJ-Portal รายการยานพาหนะ')

@section('content')
    <main class="flex-1 h-full overflow-y-auto overflow-x-hidden bg-[#f0f9ff]" x-data="vehicleApp()">

        <div class="max-w-[1440px] mx-auto p-6 md:p-8 animate-fade-in-up h-full flex flex-col">

            <button @click="sidebarOpen = true"
                class="lg:hidden mb-4 p-2 bg-white rounded-lg shadow-sm text-slate-600 w-fit">
                <span class="material-symbols-rounded text-2xl">menu</span>
            </button>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 shrink-0">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800 tracking-tight">รายการยานพาหนะ</h1>
                    <p class="text-sm text-slate-500 mt-1">จัดการข้อมูลรถราชการและรถเช่าในสังกัดทั้งหมด</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="relative">
                        <span
                            class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                        <input type="text" x-model="searchQuery" placeholder="ค้นหาทะเบียน, ยี่ห้อ..."
                            class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm bg-white focus:ring-2 focus:ring-sidebar-end/20 focus:border-sidebar-end w-64 outline-none transition-all placeholder:text-slate-400">
                    </div>
                    <button @click="openAddModal()"
                        class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-sidebar-start to-sidebar-end text-white rounded-lg text-sm font-medium shadow-md shadow-blue-500/20 hover:shadow-lg transition-all hover:-translate-y-0.5">
                        <span class="material-icons-outlined text-sm">add</span>
                        เพิ่มยานพาหนะ
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 flex flex-col flex-1 overflow-hidden">
                <div class="overflow-x-auto custom-scrollbar flex-1">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead class="bg-icon-bg/50 border-b border-gray-200 sticky top-0 z-10">
                            <tr>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider w-24">
                                    รูปรถ</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                    เลขทะเบียน / ยี่ห้อ</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider">สังกัด
                                    (สยจ.)</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider">ประเภท /
                                    กรรมสิทธิ์</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">
                                    จำนวนการซ่อม</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">
                                    สถานะ</th>
                                <th class="py-4 px-6 text-xs font-bold text-slate-500 uppercase tracking-wider text-center">
                                    จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="car in filteredVehicles" :key="car.id">
                                <tr class="hover:bg-[#f0f9ff] transition-colors group"
                                    :class="{'opacity-60 bg-slate-50': car.status === 'inactive'}">
                                    <td class="py-4 px-6 align-middle">
                                        <div @click="openGallery(car)"
                                            class="w-20 h-14 rounded-lg overflow-hidden border border-gray-200 shadow-sm bg-gray-100 relative group-hover:shadow-md transition-all cursor-pointer group/img">
                                            <img :src="car.images.front || 'https://via.placeholder.com/150?text=No+Image'"
                                                class="w-full h-full object-cover transform group-hover/img:scale-110 transition-transform duration-500">
                                            <div
                                                class="absolute inset-0 bg-black/0 group-hover/img:bg-black/10 transition-colors flex items-center justify-center opacity-0 group-hover/img:opacity-100">
                                                <span
                                                    class="material-icons-outlined text-white drop-shadow-md text-sm">collections</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 align-middle">
                                        <div>
                                            <p class="text-sm font-bold text-slate-800 group-hover:text-sidebar-end transition-colors"
                                                x-text="car.plate"></p>
                                            <p class="text-xs text-slate-500 mt-0.5" x-text="car.brand"></p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 align-middle">
                                        <div class="flex items-center gap-1.5 text-slate-600 text-xs font-medium"><span
                                                class="material-icons-outlined text-[16px] text-sidebar-end">place</span><span
                                                x-text="car.province"></span></div>
                                    </td>
                                    <td class="py-4 px-6 align-middle">
                                        <div class="flex flex-col gap-1.5"><span class="text-sm text-slate-700 font-medium"
                                                x-text="car.type"></span><span
                                                class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide w-fit"
                                                :class="car.owner === 'รถเช่า' ? 'bg-orange-50 text-orange-600 border border-orange-100' : 'bg-blue-50 text-blue-600 border border-blue-100'"><span
                                                    x-text="car.owner"></span></span></div>
                                    </td>
                                    <td class="py-4 px-6 align-middle text-center">
                                        <span class="text-sm font-bold text-slate-600"
                                            x-text="car.history.filter(h => !h.isPending).length + ' ครั้ง'"></span>
                                    </td>
                                    <td class="py-4 px-6 align-middle text-center">
                                        <div class="flex flex-col items-center gap-1">
                                            <span
                                                class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold border"
                                                :class="{'bg-green-50 text-green-700 border-green-200': car.status === 'active', 'bg-amber-50 text-amber-700 border-amber-200': car.status === 'repair', 'bg-red-50 text-red-700 border-red-200': car.status === 'suspend', 'bg-slate-100 text-slate-500 border-slate-200': car.status === 'inactive'}">
                                                <span class="w-1.5 h-1.5 rounded-full"
                                                    :class="{'bg-green-500 animate-pulse': car.status === 'active', 'bg-amber-500 animate-pulse': car.status === 'repair', 'bg-red-500': car.status === 'suspend', 'bg-slate-400': car.status === 'inactive'}"></span>
                                                <span x-text="getStatusText(car.status)"></span>
                                            </span>
                                            <template
                                                x-if="car.status === 'repair' && car.history.length > 0 && car.history[0].isPending">
                                                <span
                                                    class="text-[10px] text-orange-600 font-bold bg-orange-50 px-2 py-0.5 rounded border border-orange-100 flex items-center gap-1 animate-pulse"><span
                                                        class="material-icons-outlined text-[10px]">edit_note</span>
                                                    กรุณากรอกข้อมูลซ่อม</span>
                                            </template>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 align-middle text-center">
                                        <div class="flex items-center justify-center gap-2 opacity-100 transition-opacity">
                                            <button @click="openViewModal(car)"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:text-blue-500 hover:border-blue-200 hover:bg-blue-50 transition-all shadow-sm"
                                                title="ดูข้อมูล"><span
                                                    class="material-icons-outlined text-base">visibility</span></button>
                                            <button @click="openEditModal(car)" :disabled="car.status === 'inactive'"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:text-amber-500 hover:border-amber-200 hover:bg-amber-50 transition-all shadow-sm disabled:opacity-30 disabled:cursor-not-allowed"
                                                title="แก้ไข"><span
                                                    class="material-icons-outlined text-base">edit</span></button>
                                            <button @click="openStatusModal(car)" :disabled="car.status === 'inactive'"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:text-sidebar-end hover:border-sidebar-end hover:bg-blue-50 transition-all shadow-sm disabled:opacity-30 disabled:cursor-not-allowed"
                                                title="ตั้งค่าสถานะ"><span
                                                    class="material-symbols-rounded text-lg">settings</span></button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="galleryModalOpen" x-cloak class="fixed inset-0 z-[70] flex items-center justify-center p-4">
            <div x-show="galleryModalOpen" x-transition.opacity class="fixed inset-0 bg-black/90 backdrop-blur-sm"
                @click="galleryModalOpen = false"></div>
            <div x-show="galleryModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                class="relative z-10 w-full max-w-5xl p-4">
                <button @click="galleryModalOpen = false"
                    class="absolute -top-2 -right-2 md:-right-10 text-white hover:text-gray-300 transition z-20">
                    <span class="material-symbols-rounded text-4xl">close</span>
                </button>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <template
                        x-for="(label, key) in {front: 'ด้านหน้า', left: 'ด้านซ้าย', right: 'ด้านขวา', back: 'ด้านหลัง'}">
                        <div class="bg-white rounded-xl p-3 shadow-2xl">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-bold text-slate-700 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-sidebar-end"></span>
                                    <span x-text="label"></span>
                                </span>
                            </div>
                            <div class="aspect-video bg-slate-100 rounded-lg overflow-hidden relative group cursor-zoom-in"
                                @click="if(galleryCar && galleryCar.images && galleryCar.images[key]) viewReceipt(galleryCar.images[key], false)">
                                <template x-if="galleryCar && galleryCar.images && galleryCar.images[key]">
                                    <img :src="galleryCar.images[key]"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                </template>
                                <template x-if="!galleryCar || !galleryCar.images || !galleryCar.images[key]">
                                    <div class="w-full h-full flex flex-col items-center justify-center text-slate-300">
                                        <span class="material-icons-outlined text-4xl">image_not_supported</span>
                                        <span class="text-xs mt-1">ไม่มีรูปภาพ</span>
                                    </div>
                                </template>
                                <div x-show="galleryCar && galleryCar.images && galleryCar.images[key]"
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <span class="material-icons-outlined text-white text-3xl drop-shadow-md">zoom_in</span>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div x-show="addModalOpen" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="addModalOpen = false"></div>
            <div x-show="addModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl relative z-10 overflow-hidden flex flex-col max-h-[90vh]">
                <div
                    class="px-6 py-4 border-b border-slate-100 bg-gradient-to-r from-blue-50 to-white flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2"><span
                            class="p-2 bg-blue-100 text-blue-600 rounded-lg"><span
                                class="material-icons-outlined">add_circle</span></span> เพิ่มข้อมูลยานพาหนะ</h3><button
                        @click="addModalOpen = false"
                        class="text-slate-400 hover:text-slate-600 transition-colors p-1 rounded-full hover:bg-slate-100"><span
                            class="material-symbols-rounded text-2xl">close</span></button>
                </div>
                <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2"><label
                                    class="block text-sm font-bold text-slate-700 mb-2">ประเภทการครอบครอง <span
                                        class="text-red-500">*</span></label>
                                <div class="flex gap-4"><label
                                        class="flex items-center gap-2 cursor-pointer p-3 border border-slate-200 rounded-lg hover:bg-slate-50 transition w-full justify-center"
                                        :class="newVehicle.owner === 'รถราชการ' ? 'border-primary bg-blue-50 text-primary' : ''"><input
                                            type="radio" name="add_owner" value="รถราชการ" x-model="newVehicle.owner"
                                            class="text-sidebar-end focus:ring-sidebar-end"><span
                                            class="text-sm font-medium">รถราชการ (ซื้อ)</span></label><label
                                        class="flex items-center gap-2 cursor-pointer p-3 border border-slate-200 rounded-lg hover:bg-slate-50 transition w-full justify-center"
                                        :class="newVehicle.owner === 'รถเช่า' ? 'border-primary bg-blue-50 text-primary' : ''"><input
                                            type="radio" name="add_owner" value="รถเช่า" x-model="newVehicle.owner"
                                            class="text-sidebar-end focus:ring-sidebar-end"><span
                                            class="text-sm font-medium">รถเช่า</span></label></div>
                            </div>
                            <div class="md:col-span-2"><label class="block text-sm font-bold text-slate-700 mb-1.5">ประเภทรถ
                                    <span class="text-red-500">*</span></label>
                                <div class="relative"><select x-model="newVehicle.type"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none bg-white text-slate-600">
                                        <option value="">-- เลือกประเภท --</option>
                                        <option value="รถจักรยานยนต์">1. รถจักรยานยนต์</option>
                                        <optgroup label="2. รถยนต์">
                                            <option value="รถยนต์นั่งส่วนบุคคล ไม่เกิน 7 ที่นั่ง (เก๋ง)">-
                                                รถยนต์นั่งส่วนบุคคล ไม่เกิน 7 ที่นั่ง (เก๋ง)</option>
                                            <option value="รถยนต์นั่งส่วนบุคคล เกิน 7 ที่นั่ง (รถอเนกประสงค์)">-
                                                รถยนต์นั่งส่วนบุคคล เกิน 7 ที่นั่ง (รถอเนกประสงค์)</option>
                                            <option value="รถตู้">- รถตู้</option>
                                            <option value="รถกระบะ">- รถกระบะ</option>
                                            <option value="รถหุ้มเกราะกันกระสุน">- รถหุ้มเกราะกันกระสุน</option>
                                        </optgroup>
                                    </select><span
                                        class="material-icons-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                                </div>
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ยี่ห้อ/รุ่น <span
                                        class="text-red-500">*</span></label><input type="text" x-model="newVehicle.brand"
                                    placeholder="ระบุยี่ห้อและรุ่น"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ทะเบียนรถ <span
                                        class="text-red-500">*</span></label><input type="text" x-model="newVehicle.plate"
                                    placeholder="ระบุเลขทะเบียน"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ปีที่จดทะเบียน
                                    (พ.ศ.)</label><input type="text" x-model="newVehicle.regYear" placeholder="ระบุปี พ.ศ."
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">อายุการใช้งาน
                                    (ปี)</label><input type="number" x-model="newVehicle.age" placeholder="จำนวนปีที่ใช้งาน"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div class="md:col-span-2"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">เลขครุภัณฑ์ <span
                                        class="text-red-500">*</span></label><input type="text" x-model="newVehicle.assetNo"
                                    placeholder="หมายเลขครุภัณฑ์"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                        </div>
                        <div class="border-t border-slate-100 pt-6 mt-2">
                            <h4 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2"><span
                                    class="material-icons-outlined text-sidebar-end">speed</span> ข้อมูลสมรรถนะและวันที่
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ขนาดเครื่องยนต์
                                        (CC)</label><input type="number" x-model="newVehicle.cc" placeholder="เช่น 2400"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                                </div>
                                <div><label class="block text-sm font-bold text-slate-700 mb-1.5">เชื้อเพลิง</label>
                                    <div class="relative"><select x-model="newVehicle.fuel"
                                            class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none appearance-none bg-white">
                                            <option value="">-- เลือก --</option>
                                            <option value="ดีเซล">ดีเซล</option>
                                            <option value="เบนซิน">เบนซิน</option>
                                            <option value="ไฟฟ้า (EV)">ไฟฟ้า (EV)</option>
                                            <option value="ไฮบริด">ไฮบริด</option>
                                        </select></div>
                                </div>
                                <div><label
                                        class="block text-sm font-bold text-slate-700 mb-1.5">เลขไมล์ปัจจุบัน</label><input
                                        type="number" x-model="newVehicle.mileage" placeholder="0"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                                <div><label
                                        class="block text-sm font-bold text-slate-700 mb-1.5">วันที่จดทะเบียน</label><input
                                        type="date" x-model="newVehicle.regDate"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none text-slate-600">
                                </div>
                                <div><label class="block text-sm font-bold text-slate-700 mb-1.5">วันที่ ปสจ.
                                        ได้รับรถ</label><input type="date" x-model="newVehicle.acquireDate"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none text-slate-600">
                                </div>
                            </div>
                            <div class="mt-4"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">รายละเอียดสมรรถนะเพิ่มเติม</label><textarea
                                    x-model="newVehicle.details" rows="2" placeholder="ระบุรายละเอียดเพิ่มเติม..."
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none resize-none"></textarea>
                            </div>
                        </div>
                        <div class="border-t border-slate-100 pt-6 mt-2">
                            <h4 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2"><span
                                    class="material-icons-outlined text-sidebar-end">attach_file</span>
                                เอกสารและรูปภาพประกอบ</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">เล่มทะเบียน
                                        (แนบไฟล์เอกสาร)</label>
                                    <div
                                        class="border-2 border-dashed border-slate-300 rounded-xl bg-slate-50 hover:bg-blue-50/50 p-4 text-center cursor-pointer relative group h-20 flex flex-col items-center justify-center">
                                        <input type="file"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                            accept=".pdf,.doc,.docx,.jpg,.png" @change="handleNewDoc($event)">
                                        <div x-show="!newVehicle.docName" class="flex flex-col items-center"><span
                                                class="material-icons-outlined text-slate-400">description</span>
                                            <p class="text-xs text-slate-500 font-medium">คลิกเพื่อแนบไฟล์</p>
                                        </div>
                                        <div x-show="newVehicle.docName" class="flex items-center gap-2"
                                            @click.stop="viewReceipt(newVehicle.docFile, newVehicle.docIsPdf)"><span
                                                class="material-icons-outlined text-blue-500">insert_drive_file</span><span
                                                class="text-xs text-slate-700 truncate"
                                                x-text="newVehicle.docName"></span><button
                                                @click.prevent.stop="removeNewDoc()" class="text-red-500 z-20"><span
                                                    class="material-icons-outlined text-sm">close</span></button></div>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-slate-700 mb-3">รูปภาพรถยนต์ (4
                                        มุม)</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <template x-for="side in ['front', 'left', 'right', 'back']">
                                            <div>
                                                <label class="text-xs text-slate-500 mb-1 block capitalize"
                                                    x-text="side"></label>
                                                <div
                                                    class="border-2 border-dashed border-slate-300 rounded-lg bg-slate-50 hover:bg-blue-50/50 h-24 relative flex items-center justify-center overflow-hidden group">
                                                    <input type="file"
                                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                                        accept="image/*" @change="handleNewImage($event, side)">
                                                    <div x-show="newVehicle.images[side]" class="absolute inset-0"><img
                                                            :src="newVehicle.images[side]"
                                                            class="w-full h-full object-cover"></div>
                                                    <div x-show="!newVehicle.images[side]" class="text-center"><span
                                                            class="material-icons-outlined text-slate-400">add_a_photo</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50 flex justify-end gap-3"><button
                        @click="addModalOpen = false"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 text-sm font-bold hover:bg-white transition-all shadow-sm">ยกเลิก</button><button
                        @click="saveNewVehicle()"
                        class="px-6 py-2.5 rounded-lg bg-gradient-to-r from-sidebar-start to-sidebar-end text-white text-sm font-bold hover:shadow-lg transition-all shadow-md">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>

        <div x-show="statusModalOpen" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm" @click="statusModalOpen = false"></div>
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-10 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2"><span
                            class="material-symbols-rounded text-sidebar-end">settings</span> กำหนดสถานะการใช้งาน</h3>
                    <button @click="statusModalOpen = false"
                        class="text-slate-400 hover:text-slate-600 transition-colors"><span
                            class="material-symbols-rounded text-xl">close</span></button>
                </div>
                <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto custom-scrollbar">
                    <label class="flex items-start gap-3 p-3 border rounded-xl cursor-pointer transition-all"
                        :class="tempStatus === 'active' ? 'border-green-500 bg-green-50' : 'border-slate-200 hover:bg-slate-50'"><input
                            type="radio" value="active" x-model="tempStatus" class="mt-1">
                        <div><span class="block text-sm font-bold text-slate-700">ใช้งานปกติ (Active)</span><span
                                class="text-xs text-slate-500">รถพร้อมใช้งาน</span></div>
                    </label>
                    <label class="flex items-start gap-3 p-3 border rounded-xl cursor-pointer transition-all"
                        :class="tempStatus === 'repair' ? 'border-amber-500 bg-amber-50' : 'border-slate-200 hover:bg-slate-50'"><input
                            type="radio" value="repair" x-model="tempStatus" class="mt-1">
                        <div class="w-full"><span class="block text-sm font-bold text-slate-700">อยู่ระหว่างส่งซ่อม
                                (Repair)</span><span class="text-xs text-slate-500">รถจอดซ่อม หรือรออะไหล่</span>
                            <div x-show="tempStatus === 'repair'" x-transition class="mt-2 space-y-2"><label
                                    class="block text-xs font-semibold text-slate-500 mb-1">ระบุอาการ / สาเหตุ <span
                                        class="text-red-500">*</span></label><textarea x-model="repairReason" rows="2"
                                    placeholder="ระบุอาการเสีย หรือสาเหตุการส่งซ่อม..."
                                    class="w-full px-3 py-1.5 text-xs border border-slate-300 rounded bg-white focus:outline-none focus:border-amber-500 resize-none"></textarea>
                            </div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 border rounded-xl cursor-pointer transition-all"
                        :class="tempStatus === 'suspend' ? 'border-red-500 bg-red-50' : 'border-slate-200 hover:bg-slate-50'"><input
                            type="radio" value="suspend" x-model="tempStatus" class="mt-1">
                        <div class="w-full"><span class="block text-sm font-bold text-slate-700">งดใช้งานชั่วคราว
                                (Suspend)</span><span
                                class="text-xs text-slate-500">หยุดการใช้งานชั่วคราวด้วยเหตุผลอื่นๆ</span>
                            <div x-show="tempStatus === 'suspend'" class="mt-2 space-y-2"><input x-model="suspendReason"
                                    type="text" placeholder="ระบุเหตุผล..."
                                    class="w-full px-3 py-1.5 text-xs border border-slate-300 rounded bg-white focus:outline-none focus:border-red-500">
                            </div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 border rounded-xl cursor-pointer transition-all"
                        :class="tempStatus === 'inactive' ? 'border-slate-500 bg-slate-100' : 'border-slate-200 hover:bg-slate-50'"><input
                            type="radio" value="inactive" x-model="tempStatus" class="mt-1">
                        <div class="w-full"><span class="block text-sm font-bold text-slate-700">ปลดประจำการ
                                (Inactive)</span><span class="text-xs text-slate-500">เลิกใช้งาน, จำหน่ายออก
                                หรือโอนย้าย</span>
                            <div x-show="tempStatus === 'inactive'" class="mt-2 space-y-2"><textarea
                                    x-model="inactiveReason" rows="2" placeholder="ระบุเหตุผลการเลิกใช้งาน..."
                                    class="w-full px-3 py-1.5 text-xs border border-slate-300 rounded bg-white focus:outline-none focus:border-slate-500 resize-none"></textarea>
                                <div><label class="block text-xs font-semibold text-slate-500 mb-1">วันที่ปลดประจำการ
                                        <span class="text-red-500">*</span></label><input x-model="inactiveDate" type="date"
                                        class="w-full px-3 py-1.5 text-xs border border-slate-300 rounded bg-white focus:outline-none focus:border-slate-500 text-slate-600">
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="px-6 py-4 border-t border-slate-100 bg-slate-50 flex justify-end gap-3"><button
                        @click="statusModalOpen = false"
                        class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600 text-sm font-semibold hover:bg-white transition-all">ยกเลิก</button><button
                        @click="saveStatus()"
                        class="px-4 py-2 rounded-lg bg-sidebar-end text-white text-sm font-semibold hover:bg-sidebar-start shadow-md transition-all">บันทึกสถานะ</button>
                </div>
            </div>
        </div>

        <div x-show="editModalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div x-show="editModalOpen" class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm"
                @click="editModalOpen = false"></div>
            <div x-show="editModalOpen"
                class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl relative z-10 overflow-hidden flex flex-col max-h-[90vh]">
                <div class="bg-white border-b border-slate-200">
                    <div class="flex justify-between items-center px-6 py-4">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                            <span class="material-icons-outlined text-sidebar-end"
                                x-text="isViewOnly ? 'visibility' : 'edit'"></span>
                            <span x-text="isViewOnly ? 'รายละเอียดยานพาหนะ' : 'แก้ไขข้อมูลยานพาหนะ'"></span>
                        </h3>
                        <button @click="editModalOpen = false" class="text-slate-400 hover:text-slate-600"><span
                                class="material-symbols-rounded text-2xl">close</span></button>
                    </div>
                    <div class="flex px-6 space-x-6">
                        <button @click="activeTab = 'info'"
                            class="pb-3 text-sm font-semibold border-b-2 transition-colors duration-200 flex items-center gap-2"
                            :class="activeTab === 'info' ? 'border-sidebar-end text-sidebar-end' : 'border-transparent text-slate-500 hover:text-slate-700'"><span
                                class="material-icons-outlined text-lg">info</span> ข้อมูลทั่วไป</button>
                        <button @click="activeTab = 'history'"
                            class="pb-3 text-sm font-semibold border-b-2 transition-colors duration-200 flex items-center gap-2"
                            :class="activeTab === 'history' ? 'border-sidebar-end text-sidebar-end' : 'border-transparent text-slate-500 hover:text-slate-700'"><span
                                class="material-icons-outlined text-lg">history</span> ประวัติการซ่อม</button>
                    </div>
                </div>

                <div class="p-6 overflow-y-auto custom-scrollbar flex-1 bg-slate-50/50">
                    <div x-show="activeTab === 'info'">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-xl shadow-sm">
                            <div class="md:col-span-2"><label
                                    class="block text-sm font-bold text-slate-700 mb-2">ประเภทการครอบครอง</label>
                                <div class="flex gap-4"><label
                                        class="flex items-center gap-2 p-3 border border-slate-200 rounded-lg w-full justify-center"
                                        :class="editForm.owner === 'รถราชการ' ? 'border-primary bg-blue-50 text-primary' : ''"><input
                                            :disabled="isViewOnly" type="radio" value="รถราชการ" x-model="editForm.owner"
                                            class="text-sidebar-end focus:ring-sidebar-end"><span
                                            class="text-sm font-medium">รถราชการ (ซื้อ)</span></label><label
                                        class="flex items-center gap-2 p-3 border border-slate-200 rounded-lg w-full justify-center"
                                        :class="editForm.owner === 'รถเช่า' ? 'border-primary bg-blue-50 text-primary' : ''"><input
                                            :disabled="isViewOnly" type="radio" value="รถเช่า" x-model="editForm.owner"
                                            class="text-sidebar-end focus:ring-sidebar-end"><span
                                            class="text-sm font-medium">รถเช่า</span></label></div>
                            </div>
                            <div class="md:col-span-2"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">ประเภทรถ</label>
                                <div class="relative"><select x-model="editForm.type" :disabled="isViewOnly"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none bg-white text-slate-600">
                                        <option value="">-- เลือกประเภท --</option>
                                        <option value="รถจักรยานยนต์">1. รถจักรยานยนต์</option>
                                        <optgroup label="2. รถยนต์">
                                            <option value="รถยนต์นั่งส่วนบุคคล ไม่เกิน 7 ที่นั่ง (เก๋ง)">-
                                                รถยนต์นั่งส่วนบุคคล ไม่เกิน 7 ที่นั่ง (เก๋ง)</option>
                                            <option value="รถยนต์นั่งส่วนบุคคล เกิน 7 ที่นั่ง (รถอเนกประสงค์)">-
                                                รถยนต์นั่งส่วนบุคคล เกิน 7 ที่นั่ง (รถอเนกประสงค์)</option>
                                            <option value="รถตู้">- รถตู้</option>
                                            <option value="รถกระบะ">- รถกระบะ</option>
                                            <option value="รถหุ้มเกราะกันกระสุน">- รถหุ้มเกราะกันกระสุน</option>
                                        </optgroup>
                                    </select><span x-show="!isViewOnly"
                                        class="material-icons-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                                </div>
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ยี่ห้อ/รุ่น</label><input
                                    type="text" x-model="editForm.brand" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ทะเบียนรถ</label><input
                                    type="text" x-model="editForm.plate" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ปีที่จดทะเบียน
                                    (พ.ศ.)</label><input type="text" x-model="editForm.regYear" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">อายุการใช้งาน
                                    (ปี)</label><input type="number" x-model="editForm.age" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div class="md:col-span-2"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">เลขครุภัณฑ์</label><input
                                    type="text" x-model="editForm.assetNo" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 bg-white p-6 rounded-xl shadow-sm">
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">ขนาดเครื่องยนต์
                                    (CC)</label><input type="number" x-model="editForm.cc" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">เชื้อเพลิง</label>
                                <div class="relative"><select x-model="editForm.fuel" :disabled="isViewOnly"
                                        class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none appearance-none bg-white">
                                        <option value="">-- เลือก --</option>
                                        <option value="ดีเซล">ดีเซล</option>
                                        <option value="เบนซิน">เบนซิน</option>
                                        <option value="ไฟฟ้า (EV)">ไฟฟ้า (EV)</option>
                                        <option value="ไฮบริด">ไฮบริด</option>
                                    </select></div>
                            </div>
                            <div><label class="block text-sm font-bold text-slate-700 mb-1.5">เลขไมล์ปัจจุบัน</label><input
                                    type="number" x-model="editForm.mileage" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none">
                            </div>
                            <div class="md:col-span-1.5"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">วันที่จดทะเบียน</label><input
                                    type="date" x-model="editForm.regDate" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none text-slate-600">
                            </div>
                            <div class="md:col-span-1.5"><label class="block text-sm font-bold text-slate-700 mb-1.5">วันที่
                                    ปสจ.
                                    ได้รับรถ</label><input type="date" x-model="editForm.acquireDate" :disabled="isViewOnly"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none text-slate-600">
                            </div>
                            <div class="md:col-span-3 mt-4"><label
                                    class="block text-sm font-bold text-slate-700 mb-1.5">รายละเอียดสมรรถนะเพิ่มเติม</label><textarea
                                    x-model="editForm.details" :disabled="isViewOnly" rows="2"
                                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg outline-none resize-none"></textarea>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm mt-6">
                            <h4 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2"><span
                                    class="material-icons-outlined text-sidebar-end">attach_file</span>
                                เอกสารและรูปภาพประกอบ</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">เล่มทะเบียน
                                        (แนบไฟล์เอกสาร)</label>
                                    <div
                                        class="border-2 border-dashed border-slate-300 rounded-xl bg-slate-50 p-4 text-center relative group h-20 flex flex-col items-center justify-center">
                                        <input x-show="!isViewOnly" type="file"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                            accept=".pdf,.doc,.docx,.jpg,.png" @change="handleNewDoc($event, true)">
                                        <div x-show="!editForm.docName" class="flex items-center gap-2"><span
                                                class="material-icons-outlined text-slate-400">description</span><span
                                                class="text-xs text-slate-500 font-medium">ยังไม่มีไฟล์แนบ</span></div>
                                        <div x-show="editForm.docName" class="flex items-center gap-2 cursor-pointer"
                                            @click="viewReceipt(editForm.docFile, editForm.docIsPdf)"><span
                                                class="material-icons-outlined text-blue-500">insert_drive_file</span><span
                                                class="text-xs text-slate-700 truncate" x-text="editForm.docName"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-slate-700 mb-3">รูปภาพรถยนต์ (4
                                        มุม)</label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <template x-for="side in ['front', 'left', 'right', 'back']">
                                            <div>
                                                <label class="text-xs text-slate-500 mb-1 block capitalize"
                                                    x-text="side"></label>
                                                <div
                                                    class="border-2 border-dashed border-slate-300 rounded-lg bg-slate-50 h-24 relative flex items-center justify-center overflow-hidden group">
                                                    <input x-show="!isViewOnly" type="file"
                                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                                        accept="image/*" @change="handleVehicleImageUpload($event, side)">
                                                    <div x-show="editForm.images && editForm.images[side]"
                                                        class="absolute inset-0 cursor-pointer"
                                                        @click="viewReceipt(editForm.images[side], false)"><img
                                                            :src="editForm.images && editForm.images[side]"
                                                            class="w-full h-full object-cover"></div>
                                                    <div x-show="!editForm.images || !editForm.images[side]"
                                                        class="text-center"><span
                                                            class="material-icons-outlined text-slate-400">add_a_photo</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'history'">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="text-base font-bold text-slate-700 flex items-center gap-2"><span
                                    class="material-symbols-rounded text-orange-500">history</span> ประวัติการซ่อมบำรุง
                            </h4>
                            <button x-show="!isViewOnly && !isAddingHistory"
                                @click="isAddingHistory = true; editingIndex = -1; newRecord = { desc: '', repairDate: '', cost: '', fiscalYear: '', mileage: '', budgetType: '', receiptPreview: null, isPdf: false };"
                                class="text-xs bg-gradient-to-r from-sidebar-start to-sidebar-end text-white px-3 py-1.5 rounded-lg hover:shadow-md transition shadow-sm flex items-center gap-1"><span
                                    class="material-symbols-rounded text-sm">add</span> เพิ่มรายการ</button>
                        </div>
                        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden" x-show="!isAddingHistory">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-slate-50 text-slate-500 font-semibold border-b border-slate-200">
                                    <tr>
                                        <th class="px-4 py-3 w-32">วันที่ซ่อม</th>
                                        <th class="px-4 py-3">รายการ</th>
                                        <th class="px-4 py-3">งบประมาณ</th>
                                        <th class="px-4 py-3 text-center">สถานะ</th>
                                        <th class="px-4 py-3 text-right">เลขไมล์</th>
                                        <th class="px-4 py-3 text-right">ค่าใช้จ่าย</th>
                                        <th class="px-4 py-3 text-center">เอกสาร</th>
                                        <th x-show="!isViewOnly" class="px-4 py-3 text-center">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <template x-for="(record, index) in selectedVehicle?.history">
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3 text-slate-600" x-text="record.repairDate"></td>
                                            <td class="px-4 py-3 text-slate-800" x-text="record.desc"></td>
                                            <td class="px-4 py-3 text-slate-600"><span x-text="record.budgetType"></span>
                                                <span x-show="record.fiscalYear" x-text="'(' + record.fiscalYear + ')'"
                                                    class="text-xs text-slate-400"></span>
                                            </td>
                                            <td class="px-4 py-3 text-center"><template x-if="record.isPending"><span
                                                        class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-bold bg-orange-100 text-orange-700 border border-orange-200"><span
                                                            class="material-icons-outlined text-[10px]">warning</span>
                                                        รอลงข้อมูล</span></template><template x-if="!record.isPending"><span
                                                        class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-green-100 text-green-700 border border-green-200">เสร็จสิ้น</span></template>
                                            </td>
                                            <td class="px-4 py-3 text-right text-slate-600"><span x-show="!record.isPending"
                                                    x-text="record.mileage.toLocaleString()"></span><span
                                                    x-show="record.isPending" class="text-slate-400">-</span></td>
                                            <td class="px-4 py-3 text-right font-bold"><span x-show="!record.isPending"
                                                    class="text-slate-800"
                                                    x-text="record.cost.toLocaleString() + ' ฿'"></span><span
                                                    x-show="record.isPending" class="text-slate-400">-</span></td>
                                            <td class="px-4 py-3 text-center"><template x-if="record.receiptImg"><button
                                                        @click="viewReceipt(record.receiptImg, record.isPdf)"
                                                        class="text-slate-400 hover:text-icon-fg transition"><span
                                                            class="material-symbols-rounded text-lg">description</span></button></template><template
                                                    x-if="!record.receiptImg"><span
                                                        class="text-slate-300">-</span></template></td>
                                            <td x-show="!isViewOnly" class="px-4 py-3 text-center">
                                                <template x-if="record.isPending"><button
                                                        @click="openFillForm(record, index)"
                                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-orange-500 text-white text-xs hover:bg-orange-600 transition shadow-sm animate-pulse"><span
                                                            class="material-icons-outlined text-[14px]">edit_note</span></button></template>
                                                <template x-if="!record.isPending"><button @click="viewRecord(record)"
                                                        class="inline-flex items-center gap-1 px-2 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs hover:bg-slate-200 transition shadow-sm border border-slate-200"><span
                                                            class="material-icons-outlined text-[14px]">visibility</span></button></template>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div x-show="isAddingHistory" class="bg-icon-bg/20 border border-slate-200 rounded-xl p-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2"><label
                                        class="block text-xs font-semibold text-slate-500 uppercase mb-1">รายการที่ซ่อม
                                        <span class="text-red-500">*</span></label><textarea rows="2"
                                        x-model="newRecord.desc" :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm resize-none"></textarea>
                                </div>
                                <div><label class="block text-xs font-semibold text-slate-500 uppercase mb-1">เลขไมล์
                                        (km) <span class="text-red-500">*</span></label><input type="number"
                                        x-model="newRecord.mileage"
                                        @input="if(!newRecord.repairDate) newRecord.repairDate = new Date().toISOString().split('T')[0]"
                                        :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm">
                                </div>
                                <div><label class="block text-xs font-semibold text-slate-500 uppercase mb-1">วันที่ซ่อม
                                        (Auto) <span class="text-red-500">*</span></label><input type="date"
                                        x-model="newRecord.repairDate" :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm text-slate-600">
                                </div>
                                <div><label class="block text-xs font-semibold text-slate-500 uppercase mb-1">จำนวนเงิน
                                        <span class="text-red-500">*</span></label><input type="number"
                                        x-model="newRecord.cost" :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm">
                                </div>
                                <div><label class="block text-xs font-semibold text-slate-500 uppercase mb-1">ปีงบประมาณ
                                        <span class="text-red-500">*</span></label><input type="text"
                                        x-model="newRecord.fiscalYear" :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm">
                                </div>
                                <div><label class="block text-xs font-semibold text-slate-500 uppercase mb-1">ประเภทงบ
                                        <span class="text-red-500">*</span></label><select x-model="newRecord.budgetType"
                                        :disabled="viewOnlyMode"
                                        class="w-full px-3 py-2 border border-slate-300 rounded-lg outline-none text-sm">
                                        <option value="">-- เลือก --</option>
                                        <option>งบดำเนินงาน</option>
                                        <option>งบดอกเบี้ย</option>
                                        <option>งบกลาง</option>
                                        <option>อื่นๆ</option>
                                    </select></div>
                                <div class="md:col-span-2"><label
                                        class="block text-xs font-semibold text-slate-500 uppercase mb-1">ใบเสร็จ/เอกสารเพิ่มเติม
                                        (PDF/รูปภาพ)</label>
                                    <div x-show="!viewOnlyMode">
                                        <div x-show="!newRecord.receiptPreview"
                                            class="border-2 border-dashed border-slate-300 rounded-lg p-3 text-center hover:bg-white transition-colors cursor-pointer relative bg-white group">
                                            <input type="file"
                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                                accept=".pdf,image/*" @change="handleFileUpload($event)">
                                            <div
                                                class="flex items-center justify-center gap-2 text-slate-500 group-hover:text-sidebar-end transition-colors">
                                                <span class="material-symbols-rounded text-xl">cloud_upload</span><span
                                                    class="text-xs">คลิกแนบไฟล์</span>
                                            </div>
                                        </div>
                                        <div x-show="newRecord.receiptPreview"
                                            class="relative mt-2 w-full border border-slate-200 rounded-lg p-2 bg-white shadow-sm flex items-center gap-3">
                                            <template x-if="newRecord.isPdf"><span
                                                    class="material-icons-outlined text-red-500 text-3xl">picture_as_pdf</span></template><template
                                                x-if="!newRecord.isPdf"><img :src="newRecord.receiptPreview"
                                                    class="h-10 w-10 object-cover rounded-md border border-gray-200"></template>
                                            <div class="flex-1 overflow-hidden">
                                                <p class="text-xs font-bold text-slate-700 truncate"
                                                    x-text="newRecord.receiptName || 'เอกสารแนบ'"></p>
                                                <p class="text-[10px] text-slate-500">อัปโหลดสำเร็จ</p>
                                            </div><button @click="newRecord.receiptPreview = null"
                                                class="text-red-500 hover:text-red-700 p-1"><span
                                                    class="material-symbols-rounded text-sm">close</span></button>
                                        </div>
                                    </div>
                                    <div x-show="viewOnlyMode">
                                        <div x-show="newRecord.receiptPreview"
                                            class="flex items-center gap-2 p-2 border border-slate-200 rounded-lg bg-gray-50 cursor-pointer hover:bg-blue-50 transition"
                                            @click="viewReceipt(newRecord.receiptPreview, newRecord.isPdf)"><span
                                                class="material-icons-outlined text-blue-500">description</span><span
                                                class="text-xs text-blue-600 underline">ดูเอกสารแนบ</span></div>
                                        <div x-show="!newRecord.receiptPreview"
                                            class="p-3 text-sm text-slate-400 italic bg-gray-100 rounded-lg border border-slate-200">
                                            ไม่มีเอกสารแนบ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2 mt-4 pt-4 border-t border-slate-200"><button
                                    @click="isAddingHistory = false; editingIndex = -1; viewOnlyMode = false;"
                                    class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">ปิด</button><button
                                    x-show="!viewOnlyMode" @click="saveHistory()"
                                    class="px-4 py-2 text-xs font-semibold text-white bg-gradient-to-r from-sidebar-start to-sidebar-end rounded-lg hover:shadow-lg transition">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 border-t border-slate-100 bg-white flex justify-end gap-3">
                    <button @click="editModalOpen = false"
                        class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600 text-sm font-semibold hover:bg-white transition-all">ปิดหน้าต่าง</button>
                    <button x-show="!isViewOnly" @click="saveEdit()"
                        class="px-4 py-2 rounded-lg bg-sidebar-end text-white text-sm font-semibold hover:bg-sidebar-start shadow-md">บันทึกการแก้ไข</button>
                </div>
            </div>
        </div>

        <div x-show="receiptModalOpen" x-cloak class="fixed inset-0 z-[70] flex items-center justify-center p-4">
            <div x-show="receiptModalOpen" class="fixed inset-0 bg-black/90 backdrop-blur-sm"
                @click="receiptModalOpen = false"></div>
            <div x-show="receiptModalOpen"
                class="relative z-10 w-full max-w-4xl max-h-[90vh] p-2 flex flex-col items-center justify-center">
                <button @click="receiptModalOpen = false"
                    class="absolute -top-10 right-0 text-white hover:text-slate-300 transition p-2"><span
                        class="material-symbols-rounded text-3xl">close</span></button>
                <div class="bg-white rounded-lg shadow-2xl w-full h-full overflow-hidden flex items-center justify-center relative"
                    style="min-height: 500px;">
                    <template x-if="selectedReceiptIsPdf"><embed :src="selectedReceiptImg" type="application/pdf"
                            class="w-full h-[80vh]"></template>
                    <template x-if="!selectedReceiptIsPdf"><img :src="selectedReceiptImg"
                            class="max-w-full max-h-[80vh] object-contain"></template>
                </div>
            </div>
        </div>

    </main>
@endsection

@push('scripts')
    <script>
        function vehicleApp() {
            return {
                sidebarOpen: false, searchQuery: '',
                addModalOpen: false, isViewOnly: false,
                newVehicle: { brand: '', plate: '', regYear: '', age: '', assetNo: '', owner: 'รถราชการ', type: '', cc: '', fuel: '', mileage: '', regDate: '', acquireDate: '', details: '', images: { front: null, left: null, right: null, back: null }, docName: null, docFile: null, docIsPdf: false },

                historyModalOpen: false, isAddingHistory: false, editingIndex: -1, viewOnlyMode: false, selectedVehicle: null,
                newRecord: { desc: '', repairDate: '', cost: '', fiscalYear: '', mileage: '', budgetType: '', receiptPreview: null, isPdf: false, receiptName: '' },

                receiptModalOpen: false, selectedReceiptImg: '', selectedReceiptIsPdf: false,
                statusModalOpen: false, tempStatus: '', repairReason: '', suspendReason: '', suspendDate: '', inactiveReason: '', inactiveDate: '',
                editModalOpen: false, activeTab: 'info', editForm: { images: {} },

                // New Gallery State
                galleryModalOpen: false, galleryCar: null,

                vehicles: [
                    {
                        id: 1,
                        images: { front: 'https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&w=200&q=80', left: null, right: null, back: null },
                        plate: '1กข 1234', brand: 'Honda CRV', province: 'กรุงเทพมหานคร', type: 'รถยนต์นั่งส่วนบุคคล เกิน 7 ที่นั่ง (รถอเนกประสงค์)', owner: 'รถราชการ',
                        status: 'active',
                        history: [
                            { repairDate: '2023-01-10', shop: 'อู่ A', desc: 'ซ่อมบำรุง', cost: 1000, mileage: 10000, budgetType: 'งบดำเนินงาน', fiscalYear: '2566', receiptImg: null, isPending: false },
                            { repairDate: '2023-06-15', shop: 'อู่ B', desc: 'เปลี่ยนยาง', cost: 5000, mileage: 15000, budgetType: 'งบดำเนินงาน', fiscalYear: '2566', receiptImg: null, isPending: false }
                        ]
                    },
                    {
                        id: 2,
                        images: { front: 'https://images.unsplash.com/photo-1559416523-140ddc3d238c?auto=format&fit=crop&w=200&q=80', left: null, right: null, back: null },
                        plate: 'นข 9999', brand: 'Toyota', model: 'Commuter', color: 'ขาว',
                        province: 'เชียงใหม่', type: 'รถตู้', owner: 'รถเช่า',
                        status: 'repair',
                        cc: 3000, fuel: 'ดีเซล', mileage: 150000,
                        chassis_no: 'COMM123456', engine_no: '1KD-FTV',
                        regYear: '2563', regDate: '2020-05-15', acquireDate: '2020-06-01',
                        age: '4', details: 'รถตู้ VIP 9 ที่นั่ง', assetNo: '-',
                        docName: null, docFile: null, docIsPdf: false,
                        history: [
                            { repairDate: '2025-10-25', shop: '-', desc: 'เบรกมีเสียงดัง', cost: 0, mileage: 0, budgetType: '-', fiscalYear: '-', receiptImg: null, isPending: true },
                            { repairDate: '2024-01-10', shop: 'อู่สมชาย', desc: 'เปลี่ยนถ่ายน้ำมันเครื่อง', cost: 2500, mileage: 140000, budgetType: 'งบดำเนินงาน', fiscalYear: '2567', receiptImg: null, isPending: false }
                        ]
                    },
                    {
                        id: 3,
                        images: { front: 'https://images.unsplash.com/photo-1533473359331-0135ef1bcfb0?auto=format&fit=crop&w=200&q=80', left: null, right: null, back: null },
                        plate: '3ฒณ 1234', brand: 'Isuzu', model: 'D-Max', color: 'เงิน',
                        province: 'กรุงเทพมหานคร', type: 'รถกระบะ', owner: 'รถราชการ',
                        status: 'active',
                        cc: 1900, fuel: 'ดีเซล', mileage: 45000,
                        chassis_no: 'ISUZ123456789', engine_no: 'RZ4E',
                        regYear: '2565', regDate: '2022-02-20', acquireDate: '2022-03-01',
                        age: '2', details: 'แคป 4 ประตู', assetNo: '65-112-005',
                        docName: null, docFile: null, docIsPdf: false,
                        history: []
                    },
                    {
                        id: 4,
                        images: { front: 'https://images.unsplash.com/photo-1621007947382-bb3c3968e3bb?auto=format&fit=crop&w=200&q=80', left: null, right: null, back: null },
                        plate: '1กค 1111', brand: 'Toyota', model: 'Camry', color: 'ดำ',
                        province: 'ขอนแก่น', type: 'รถยนต์นั่งส่วนบุคคล ไม่เกิน 7 ที่นั่ง (เก๋ง)', owner: 'รถราชการ',
                        status: 'suspend',
                        cc: 2500, fuel: 'ไฮบริด', mileage: 89000,
                        chassis_no: 'CAM123456', engine_no: 'A25A-FKS',
                        regYear: '2564', regDate: '2021-11-11', acquireDate: '2021-12-01',
                        age: '3', details: 'รถประจำตำแหน่ง', assetNo: '64-001-001',
                        docName: null, docFile: null, docIsPdf: false,
                        history: [
                            { repairDate: '2023-05-20', shop: 'ศูนย์โตโยต้า', desc: 'เช็คระยะ 60,000 กม.', cost: 4500, mileage: 60000, budgetType: 'งบดำเนินงาน', fiscalYear: '2566', receiptImg: null, isPending: false }
                        ]
                    }
                ],

                openAddModal() {
                    this.newVehicle = { brand: '', plate: '', regYear: '', age: '', assetNo: '', owner: 'รถราชการ', type: '', cc: '', fuel: '', mileage: '', regDate: '', acquireDate: '', details: '', images: { front: null, left: null, right: null, back: null }, docName: null, docFile: null, docIsPdf: false };
                    this.addModalOpen = true;
                },
                handleNewImage(event, side) { const file = event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { this.newVehicle.images[side] = e.target.result; }; reader.readAsDataURL(file); } },
                removeNewImage() { this.newVehicle.imgPreview = null; },

                handleNewDoc(event, isEdit = false) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            if (isEdit) {
                                this.editForm.docName = file.name;
                                this.editForm.docFile = e.target.result;
                                this.editForm.docIsPdf = file.type === 'application/pdf';
                            } else {
                                this.newVehicle.docName = file.name;
                                this.newVehicle.docFile = e.target.result;
                                this.newVehicle.docIsPdf = file.type === 'application/pdf';
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                },
                removeNewDoc() { this.newVehicle.docName = null; this.newVehicle.docFile = null; },
                saveNewVehicle() {
                    if (!this.newVehicle.brand || !this.newVehicle.plate) { alert("กรุณากรอกข้อมูลสำคัญ"); return; }
                    const newEntry = { id: Date.now(), images: { ...this.newVehicle.images }, plate: this.newVehicle.plate, brand: this.newVehicle.brand, province: 'กรุงเทพมหานคร', type: this.newVehicle.type, owner: this.newVehicle.owner, status: 'active', repairCount: 0, model: '', color: '', cc: this.newVehicle.cc, fuel: this.newVehicle.fuel, mileage: this.newVehicle.mileage, chassis_no: '', engine_no: '', regYear: this.newVehicle.regYear, regDate: this.newVehicle.regDate, acquireDate: this.newVehicle.acquireDate, age: this.newVehicle.age, details: this.newVehicle.details, assetNo: this.newVehicle.assetNo, docName: this.newVehicle.docName, docFile: this.newVehicle.docFile, docIsPdf: this.newVehicle.docIsPdf, history: [] };
                    this.vehicles.unshift(newEntry); this.addModalOpen = false;
                },
                get filteredVehicles() { if (this.searchQuery === '') return this.vehicles; return this.vehicles.filter(v => v.plate.includes(this.searchQuery) || v.brand.toLowerCase().includes(this.searchQuery.toLowerCase())); },
                getStatusText(status) { switch (status) { case 'active': return 'ปกติ'; case 'repair': return 'ส่งซ่อม'; case 'suspend': return 'งดใช้ชั่วคราว'; case 'inactive': return 'เลิกใช้งาน'; default: return status; } },
                openStatusModal(car) { this.selectedVehicle = car; this.tempStatus = car.status; this.repairReason = ''; this.suspendReason = ''; this.statusModalOpen = true; },

                // Save Status: Create Pending Record
                saveStatus() {
                    if (this.tempStatus === 'repair' && !this.repairReason) { alert('ระบุสาเหตุ'); return; }
                    const today = new Date().toISOString().split('T')[0];
                    if (this.tempStatus === 'repair') {
                        this.selectedVehicle.history.unshift({ repairDate: today, shop: '-', desc: this.repairReason, cost: 0, mileage: 0, budgetType: '-', fiscalYear: '-', receiptImg: null, isPending: true });
                    }
                    this.selectedVehicle.status = this.tempStatus;
                    this.statusModalOpen = false;
                },

                openEditModal(car) {
                    this.selectedVehicle = car;
                    this.editForm = JSON.parse(JSON.stringify(car));
                    if (!this.editForm.images) this.editForm.images = { front: null, left: null, right: null, back: null };
                    this.activeTab = 'info';
                    this.isViewOnly = false;
                    this.editModalOpen = true;
                },
                openViewModal(car) {
                    this.selectedVehicle = car;
                    this.editForm = JSON.parse(JSON.stringify(car));
                    if (!this.editForm.images) this.editForm.images = { front: null, left: null, right: null, back: null };
                    this.activeTab = 'info';
                    this.isViewOnly = true;
                    this.editModalOpen = true;
                },
                saveEdit() {
                    const index = this.vehicles.findIndex(v => v.id === this.editForm.id);
                    if (index !== -1) { this.vehicles[index] = { ...this.editForm }; }
                    this.editModalOpen = false;
                },
                handleVehicleImageUpload(event, side) { const file = event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { if (!this.editForm.images) this.editForm.images = {}; this.editForm.images[side] = e.target.result; }; reader.readAsDataURL(file); } },
                openFillForm(record, index) { this.newRecord = { ...record, receiptPreview: record.receiptImg }; this.editingIndex = index; this.isAddingHistory = true; this.viewOnlyMode = false; },
                viewRecord(record) { this.newRecord = { ...record, receiptPreview: record.receiptImg }; this.isAddingHistory = true; this.viewOnlyMode = true; },
                viewReceipt(imgUrl, isPdf) { if (imgUrl) { this.selectedReceiptImg = imgUrl; this.selectedReceiptIsPdf = isPdf; this.receiptModalOpen = true; } else { alert('ไม่มีเอกสารแนบ'); } },
                handleFileUpload(event) { const file = event.target.files[0]; if (file) { this.newRecord.receiptName = file.name; this.newRecord.isPdf = file.type === 'application/pdf'; const reader = new FileReader(); reader.onload = (e) => { this.newRecord.receiptPreview = e.target.result; }; reader.readAsDataURL(file); } },

                // New function to open Gallery Modal
                openGallery(car) {
                    this.galleryCar = car;
                    // Ensure images object exists to prevent errors
                    if (!this.galleryCar.images) this.galleryCar.images = { front: null, left: null, right: null, back: null };
                    this.galleryModalOpen = true;
                },

                saveHistory() {
                    // Validation: Check required fields
                    if (!this.newRecord.desc || !this.newRecord.repairDate || !this.newRecord.cost || !this.newRecord.mileage || !this.newRecord.budgetType || !this.newRecord.fiscalYear) {
                        alert("กรุณากรอกข้อมูลให้ครบถ้วนทุกช่อง (ที่มีเครื่องหมาย *)");
                        return;
                    }

                    // Validation: Check receipt/document
                    if (!this.newRecord.receiptPreview) {
                        alert("กรุณาแนบใบเสร็จหรือเอกสารประกอบ (PDF/รูปภาพ) ก่อนบันทึกข้อมูล");
                        return;
                    }

                    const updatedRecord = {
                        ...this.newRecord,
                        isPending: false,
                        receiptImg: this.newRecord.receiptPreview,
                        isPdf: this.newRecord.isPdf
                    };

                    if (this.editingIndex > -1) {
                        // Update existing record (e.g., Pending -> Done) to ensure reactivity
                        this.selectedVehicle.history[this.editingIndex] = {
                            ...this.selectedVehicle.history[this.editingIndex],
                            ...updatedRecord
                        };
                        // Sync with editForm to prevent overwrite when saving modal
                        if (this.editForm && this.editForm.history && this.editForm.history[this.editingIndex]) {
                             this.editForm.history[this.editingIndex] = { ...this.editForm.history[this.editingIndex], ...updatedRecord };
                        }
                    } else {
                        // Add new record manually
                        const newHist = { ...updatedRecord };
                        this.selectedVehicle.history.unshift(newHist);
                        // Sync with editForm
                        if (this.editForm && this.editForm.history) {
                             this.editForm.history.unshift(newHist);
                        }
                    }

                    // Auto-set status back to Active if currently Repair
                    if (this.selectedVehicle.status === 'repair') {
                        this.selectedVehicle.status = 'active';
                        // Sync status to editForm to ensure main save works
                        if (this.editForm) {
                            this.editForm.status = 'active';
                        }
                        alert("บันทึกข้อมูลการซ่อมเสร็จสิ้น สถานะรถเปลี่ยนเป็น 'ปกติ' เรียบร้อยแล้ว");
                    }

                    this.isAddingHistory = false;
                }
            }
        }
    </script>
@endpush