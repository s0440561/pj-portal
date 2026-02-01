@extends('layouts.app')

@section('title', 'เพิ่มข้อมูลสถานที่')

@section('content')
    <div class="max-w-[1024px] mx-auto px-4 py-8 pb-32 w-full" x-data="addPlaceForm()">

        <nav class="flex items-center text-sm text-[#60788a] mb-6">
            <a class="hover:text-primary transition-colors" href="{{ route('home') }}">หน้าหลัก</a>
            <span class="material-symbols-outlined text-base mx-2">chevron_right</span>
            <a class="hover:text-primary transition-colors" href="{{ route('place') }}">ข้อมูลหน่วยงาน</a>
            <span class="material-symbols-outlined text-base mx-2">chevron_right</span>
            <span class="text-[#111518] font-medium">เพิ่มข้อมูลสถานที่</span>
        </nav>

        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-[#111518] tracking-tight mb-2">ข้อมูลสถานที่</h1>
            <p class="text-[#60788a] text-lg">สำนักงานยุติธรรมจังหวัดเชียงใหม่</p>
        </div>

        <form class="flex flex-col gap-8" onsubmit="event.preventDefault();">

            <section class="bg-white rounded-2xl shadow-sm border border-[#e1e6ea] overflow-hidden">
                <div class="px-6 py-4 border-b border-[#f0f3f5] bg-gray-50/50 flex items-center gap-3">
                    <div class="bg-primary/10 p-2 rounded-lg text-primary">
                        <span class="material-symbols-outlined">location_on</span>
                    </div>
                    <h3 class="text-lg font-bold text-[#111518]">ข้อมูลทั่วไปและที่ตั้ง</h3>
                </div>
                <div class="p-6 md:p-8 space-y-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="lg:col-span-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="col-span-1"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">เลขที่</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none"
                                    placeholder="เลขที่" type="text" /></div>
                            <div class="col-span-1"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">หมู่ที่</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none"
                                    placeholder="หมู่ที่" type="text" /></div>
                            <div class="col-span-1"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ซอย</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none"
                                    placeholder="ซอย" type="text" /></div>
                            <div class="col-span-1"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ถนน</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none"
                                    placeholder="ถนน" type="text" /></div>
                        </div>
                        <div><label class="block text-sm font-semibold text-[#111518] mb-2">จังหวัด</label>
                            <div class="relative"><select
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] bg-white outline-none">
                                    <option selected="">เชียงใหม่</option>
                                    <option>เชียงราย</option>
                                </select></div>
                        </div>
                        <div><label class="block text-sm font-semibold text-[#111518] mb-2">อำเภอ</label>
                            <div class="relative"><select
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] bg-white outline-none">
                                    <option selected="">เมืองเชียงใหม่</option>
                                    <option>แม่ริม</option>
                                </select></div>
                        </div>
                        <div><label class="block text-sm font-semibold text-[#111518] mb-2">ตำบล</label>
                            <div class="relative"><select
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] bg-white outline-none">
                                    <option selected="">ช้างเผือก</option>
                                    <option>สุเทพ</option>
                                </select></div>
                        </div>
                        <div><label class="block text-sm font-semibold text-[#111518] mb-2">รหัสไปรษณีย์</label><input
                                class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none" type="text"
                                value="50300" /></div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex flex-wrap items-end gap-4">
                            <div class="flex-1 min-w-[200px]"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ละติจูด
                                    (Latitude)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none" type="text"
                                    value="18.8096" /></div>
                            <div class="flex-1 min-w-[200px]"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ลองจิจูด
                                    (Longitude)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] outline-none" type="text"
                                    value="98.9734" /></div>
                            <button
                                class="h-11 px-6 bg-[#f0f3f5] hover:bg-[#e1e6ea] text-[#111518] font-semibold rounded-lg flex items-center gap-2"><span
                                    class="material-symbols-outlined">my_location</span><span>พิกัดปัจจุบัน</span></button>
                        </div>
                        <div
                            class="relative w-full h-[300px] bg-[#eef4f9] rounded-xl overflow-hidden border border-[#dbe1e6] flex items-center justify-center text-gray-400">
                            <span class="material-symbols-outlined text-5xl">map</span> <span class="ml-2">แผนที่</span>
                        </div>
                    </div>

                    <div class="h-px bg-gray-100 w-full"></div>

                    <div>
                        <label class="block text-sm font-semibold text-[#111518] mb-3">ระบุประเภทอาคาร <span
                                class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="cursor-pointer group relative">
                                <input class="peer sr-only" name="building_type" type="radio" value="integrated"
                                    x-model="buildingType" />
                                <div
                                    class="h-full flex flex-col items-center justify-center p-4 rounded-xl border-2 border-[#e1e6ea] bg-white text-[#60788a] group-hover:border-primary/50 group-hover:bg-primary/5 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary transition-all">
                                    <span class="material-symbols-outlined mb-2 text-3xl">apartment</span>
                                    <span class="font-bold text-sm">อาคารบูรณาการ</span>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 bg-primary text-white rounded-full p-1 opacity-0 peer-checked:opacity-100 transition-opacity transform scale-0 peer-checked:scale-100 duration-200 shadow-md">
                                    <span class="material-symbols-outlined text-sm font-bold block">check</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input class="peer sr-only" name="building_type" type="radio" value="own"
                                    x-model="buildingType" />
                                <div
                                    class="h-full flex flex-col items-center justify-center p-4 rounded-xl border-2 border-[#e1e6ea] bg-white text-[#60788a] group-hover:border-primary/50 group-hover:bg-primary/5 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary transition-all">
                                    <span class="material-symbols-outlined mb-2 text-3xl">home_work</span>
                                    <span class="font-bold text-sm">อาคารตนเอง</span>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 bg-primary text-white rounded-full p-1 opacity-0 peer-checked:opacity-100 transition-opacity transform scale-0 peer-checked:scale-100 duration-200 shadow-md">
                                    <span class="material-symbols-outlined text-sm font-bold block">check</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input class="peer sr-only" name="building_type" type="radio" value="rent"
                                    x-model="buildingType" />
                                <div
                                    class="h-full flex flex-col items-center justify-center p-4 rounded-xl border-2 border-[#e1e6ea] bg-white text-[#60788a] group-hover:border-primary/50 group-hover:bg-primary/5 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary transition-all">
                                    <span class="material-symbols-outlined mb-2 text-3xl">real_estate_agent</span>
                                    <span class="font-bold text-sm">อาคารเช่า</span>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 bg-primary text-white rounded-full p-1 opacity-0 peer-checked:opacity-100 transition-opacity transform scale-0 peer-checked:scale-100 duration-200 shadow-md">
                                    <span class="material-symbols-outlined text-sm font-bold block">check</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group relative">
                                <input class="peer sr-only" name="building_type" type="radio" value="gov"
                                    x-model="buildingType" />
                                <div
                                    class="h-full flex flex-col items-center justify-center p-4 rounded-xl border-2 border-[#e1e6ea] bg-white text-[#60788a] group-hover:border-primary/50 group-hover:bg-primary/5 peer-checked:border-primary peer-checked:bg-primary/5 peer-checked:text-primary transition-all">
                                    <span class="material-symbols-outlined mb-2 text-3xl">account_balance</span>
                                    <span class="font-bold text-sm">อาคารส่วนราชการ</span>
                                </div>
                                <div
                                    class="absolute -top-2 -right-2 bg-primary text-white rounded-full p-1 opacity-0 peer-checked:opacity-100 transition-opacity transform scale-0 peer-checked:scale-100 duration-200 shadow-md">
                                    <span class="material-symbols-outlined text-sm font-bold block">check</span>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-2xl shadow-sm border border-[#e1e6ea] overflow-hidden" x-show="buildingType"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                <div class="px-6 py-4 border-b border-[#f0f3f5] bg-gray-50/50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="bg-primary/10 p-2 rounded-lg text-primary">
                            <span class="material-symbols-outlined">domain</span>
                        </div>
                        <h3 class="text-lg font-bold text-[#111518]">รายละเอียดข้อมูลอาคาร</h3>
                    </div>
                    <div class="px-3 py-1 rounded-full bg-blue-50 text-primary text-xs font-bold border border-blue-100"
                        x-text="buildingType === 'integrated' ? 'อาคารบูรณาการ' : buildingType === 'own' ? 'อาคารตนเอง' : buildingType === 'rent' ? 'อาคารเช่า' : 'อาคารส่วนราชการ'">
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    <div x-show="buildingType === 'integrated' || buildingType === 'own'">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <div class="lg:col-span-3 space-y-3">
                                <div class="flex justify-between items-end mb-1">
                                    <label
                                        class="block text-sm font-semibold text-[#111518]">รายละเอียดพื้นที่หน่วยงานภายใน</label>
                                    <button @click="addAgency()" type="button"
                                        class="text-xs flex items-center gap-1 bg-green-50 text-green-700 px-3 py-1.5 rounded-lg border border-green-200 hover:bg-green-100 transition-colors font-bold">
                                        <span class="material-symbols-outlined text-sm">add</span> เพิ่มหน่วยงาน
                                    </button>
                                </div>
                                <div class="border border-[#dbe1e6] rounded-xl overflow-hidden">
                                    <table class="w-full text-left text-sm">
                                        <thead class="bg-gray-50 text-[#60788a] border-b border-[#e1e6ea]">
                                            <tr>
                                                <th class="px-4 py-3 font-semibold w-24">ชั้นที่</th>
                                                <th class="px-4 py-3 font-semibold">ชื่อหน่วยงาน/ส่วนงาน</th>
                                                <th class="px-4 py-3 font-semibold w-40">พื้นที่ (ตร.ม.)</th>
                                                <th class="px-4 py-3 font-semibold w-16 text-center">ลบ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-100">
                                            <template x-for="(agency, index) in agencies" :key="index">
                                                <tr class="hover:bg-[#f9fafb]">
                                                    <td class="px-2 py-2"><input x-model="agency.floor" type="text"
                                                            class="w-full h-9 px-3 rounded border border-gray-300 focus:border-primary outline-none text-center"
                                                            placeholder="ชั้น"></td>
                                                    <td class="px-2 py-2"><input x-model="agency.name" type="text"
                                                            class="w-full h-9 px-3 rounded border border-gray-300 focus:border-primary outline-none"
                                                            placeholder="ระบุชื่อหน่วยงาน"></td>
                                                    <td class="px-2 py-2"><input x-model="agency.area" type="number"
                                                            class="w-full h-9 px-3 rounded border border-gray-300 focus:border-primary outline-none text-right"
                                                            placeholder="0"></td>
                                                    <td class="px-2 py-2 text-center"><button @click="removeAgency(index)"
                                                            type="button" class="text-gray-400 hover:text-red-500 p-1"><span
                                                                class="material-symbols-outlined text-lg">delete</span></button>
                                                    </td>
                                                </tr>
                                            </template>
                                            <tr x-show="agencies.length === 0">
                                                <td colspan="4"
                                                    class="px-4 py-6 text-center text-gray-400 text-sm italic bg-gray-50/50">
                                                    ยังไม่มีข้อมูลหน่วยงาน (กดปุ่มเพิ่มด้านบน)</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="bg-gray-50 font-bold text-[#111518] border-t border-[#e1e6ea]">
                                            <tr>
                                                <td colspan="2"
                                                    class="text-right px-4 py-3 text-xs uppercase tracking-wide text-[#60788a]">
                                                    รวมพื้นที่ทั้งหมด</td>
                                                <td class="px-4 py-3 text-right text-primary"><span
                                                        x-text="totalAgencyArea.toLocaleString()"></span> ตร.ม.</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="lg:col-span-3"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">เป็นพื้นที่เดิมของหน่วยงานอะไร</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="เช่น ที่ราชพัสดุ, เรือนจำ, ที่ดิน สปก." type="text" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">ปีที่สร้างเสร็จ
                                    (พ.ศ.)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="25XX" type="text" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">ปีที่เริ่มเปิดใช้งาน
                                    (พ.ศ.)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="25XX" type="text" /></div>
                            <div><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">วันครบกำหนดรับประกัน</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    type="date" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">พื้นที่ใช้สอยรวม
                                    (ตรม.)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none bg-gray-50"
                                    placeholder="คำนวณอัตโนมัติ" type="number" :value="totalAgencyArea" readonly />
                            </div>

                            <div class="bg-[#f8fafc] p-4 rounded-xl border border-[#e1e6ea] lg:col-span-2">
                                <label class="block text-sm font-bold text-[#111518] mb-3">ร้านค้าสวัสดิการ</label>
                                <div class="flex items-center gap-6">
                                    <label class="flex items-center gap-2 cursor-pointer"><input
                                            class="size-4 text-primary focus:ring-primary border-gray-300" name="welfare"
                                            type="radio" /><span class="text-sm font-medium">มี</span></label>
                                    <label class="flex items-center gap-2 cursor-pointer"><input checked=""
                                            class="size-4 text-primary focus:ring-primary border-gray-300" name="welfare"
                                            type="radio" /><span class="text-sm font-medium">ไม่มี</span></label>
                                </div>
                            </div>
                            <div class="bg-[#f8fafc] p-4 rounded-xl border border-[#e1e6ea] lg:col-span-3">
                                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8">
                                    <div>
                                        <label class="block text-sm font-bold text-[#111518] mb-3">บ้านพัก/แฟลต</label>
                                        <div class="flex items-center gap-6">
                                            <label class="flex items-center gap-2 cursor-pointer"><input
                                                    class="size-4 text-primary focus:ring-primary border-gray-300"
                                                    name="housing" type="radio" value="true" x-model="hasHousing"
                                                    @change="hasHousing = true" /><span
                                                    class="text-sm font-medium">มี</span></label>
                                            <label class="flex items-center gap-2 cursor-pointer"><input
                                                    class="size-4 text-primary focus:ring-primary border-gray-300"
                                                    name="housing" type="radio" value="false" x-model="hasHousing"
                                                    @change="hasHousing = false" /><span
                                                    class="text-sm font-medium">ไม่มี</span></label>
                                        </div>
                                    </div>
                                    <div class="h-8 w-[1px] bg-gray-300 hidden sm:block" x-show="hasHousing"></div>
                                    <div class="flex flex-1 gap-4" x-show="hasHousing" x-transition>
                                        <div class="flex-1"><label
                                                class="block text-xs font-medium text-[#60788a] mb-1">ประเภท</label><select
                                                class="w-full h-10 px-3 rounded-md border border-[#dbe1e6] text-sm focus:border-primary outline-none">
                                                <option>บ้านพัก (หลัง)</option>
                                                <option>แฟลต (ห้อง/ยูนิต)</option>
                                            </select></div>
                                        <div class="w-32"><label
                                                class="block text-xs font-medium text-[#60788a] mb-1">จำนวน</label><input
                                                class="w-full h-10 px-3 rounded-md border border-[#dbe1e6] text-sm focus:border-primary outline-none"
                                                type="number" placeholder="0" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show="buildingType === 'rent'">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-3"><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ระบุข้อมูลเบื้องต้น</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="เช่น อาคารพาณิชย์ 3 คูหา สูง 4 ชั้น" type="text" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">พื้นที่ใช้สอย
                                    (ตร.ม.)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="ระบุขนาดพื้นที่" type="number" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">ราคาค่าเช่าต่อเดือน
                                    (บาท)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="ระบุราคา" type="number" /></div>
                        </div>
                    </div>

                    <div x-show="buildingType === 'gov'">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label
                                    class="block text-sm font-semibold text-[#111518] mb-2">ประเภทสถานที่ราชการ</label><select
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] bg-white focus:border-primary outline-none">
                                    <option>อาคารศาลากลางจังหวัด</option>
                                    <option>อาคารส่วนราชการอื่นๆ (ระบุ)</option>
                                </select></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">ระบุชื่ออาคาร/สถานที่
                                    (กรณีอื่นๆ)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="เช่น บริเวณศูนย์ราชการ, คุมประพฤติ, เรือนจำ" type="text" /></div>
                            <div><label class="block text-sm font-semibold text-[#111518] mb-2">พื้นที่ใช้สอย
                                    (ตร.ม.)</label><input
                                    class="w-full h-11 px-4 rounded-lg border border-[#dbe1e6] focus:border-primary outline-none"
                                    placeholder="ระบุขนาดพื้นที่" type="number" /></div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="p-6 md:p-8 bg-white rounded-2xl shadow-sm border border-[#e1e6ea]">
                <label class="block text-sm font-bold text-[#111518] mb-4">รูปภาพประกอบ (4-5 รูป)</label>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    <div
                        class="aspect-square rounded-xl border-2 border-dashed border-[#cbd5e1] hover:border-primary hover:bg-primary/5 cursor-pointer flex flex-col items-center justify-center transition-all group text-[#60788a]">
                        <span
                            class="material-symbols-outlined text-3xl mb-2 group-hover:text-primary transition-colors">add_photo_alternate</span>
                        <span class="text-xs font-medium group-hover:text-primary transition-colors">อัพโหลดรูปภาพ</span>
                    </div>
                    <div
                        class="relative aspect-square rounded-xl overflow-hidden group shadow-sm bg-gray-100 flex items-center justify-center text-gray-400">
                        <span class="material-symbols-outlined">image</span>
                    </div>
                </div>
                <p class="text-xs text-[#9aaebc] mt-3">* รองรับไฟล์ .jpg, .png ขนาดไม่เกิน 5MB</p>
            </div>

            <div class="fixed bottom-6 left-0 right-0 z-50 px-4 pointer-events-none">
                <div class="max-w-[1024px] mx-auto pointer-events-auto">
                    <div
                        class="bg-white/90 backdrop-blur-md border border-[#e1e6ea] shadow-2xl rounded-2xl p-4 flex items-center justify-between transition-all">
                        <button class="px-6 py-2.5 rounded-lg text-[#60788a] font-bold hover:bg-gray-100 transition-colors"
                            type="button">ยกเลิก</button>
                        <div class="flex gap-3">
                            <button
                                class="px-6 py-2.5 rounded-lg border border-[#dbe1e6] bg-white text-[#111518] font-bold hover:bg-gray-50 transition-colors shadow-sm"
                                type="button">บันทึกร่าง</button>
                            <button
                                class="px-8 py-2.5 rounded-lg bg-primary text-white font-bold hover:bg-[#07538e] transition-colors shadow-md shadow-primary/30 flex items-center gap-2"
                                type="submit">
                                <span class="material-symbols-outlined text-sm">save</span> บันทึกข้อมูล
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function addPlaceForm() {
            return {
                buildingType: null,
                hasHousing: false,
                agencies: [{ floor: '', name: '', area: '' }],
                addAgency() { this.agencies.push({ floor: '', name: '', area: '' }); },
                removeAgency(index) { this.agencies.splice(index, 1); },
                get totalAgencyArea() { return this.agencies.reduce((sum, item) => sum + (parseFloat(item.area) || 0), 0); }
            }
        }
    </script>
@endpush