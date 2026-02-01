@extends('layouts.app')

@section('title', 'PJ-Portal - ช่องทางการติดต่อ')

@section('content')
    <div x-data="{ activeModal: null }" class="flex flex-col h-full w-full">
        <div class="layout-container flex h-full grow flex-col max-w-[1440px] mx-auto w-full px-4 md:px-8 py-6 md:py-8">
            <div class="flex flex-wrap gap-2 px-1 mb-4">
                <a class="text-[#5f788c] hover:text-primary text-sm font-medium leading-normal flex items-center gap-1"
                    href="{{ route('home') }}">
                    <span class="material-symbols-outlined text-[16px]">home</span> หน้าหลัก
                </a>
                <span class="text-[#5f788c] text-sm font-medium leading-normal">/</span>
                <span class="text-primary text-sm font-medium leading-normal">ช่องทางการติดต่อ</span>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-5 mb-8">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#111518] text-2xl md:text-3xl font-bold leading-tight tracking-[-0.02em]">
                        ช่องทางการติดต่อ (Contact Channels)</h1>
                    <p class="text-[#5f788c] text-sm md:text-base font-normal leading-normal max-w-2xl">
                        ข้อมูลติดต่อหน่วยงาน เบอร์โทรศัพท์ภายใน และช่องทางโซเชียลมีเดีย</p>
                </div>
            </div>



            <div class="bg-white rounded-xl border border-[#dbe1e6] shadow-sm p-4 md:p-6 mb-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                    <h3 class="text-lg md:text-xl font-bold text-[#111518] flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">perm_phone_msg</span> เบอร์โทรศัพท์ภายใน /
                        กอง
                    </h3>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
                        <div class="relative flex-1 sm:flex-none">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-[#9ca3af] text-[20px]">search</span>
                            </div>
                            <input
                                class="block w-full sm:w-64 pl-10 pr-3 py-2 border border-gray-200 rounded-lg leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
                                placeholder="ค้นหาหน่วยงาน/เบอร์โทร..." type="text" />
                        </div>
                        <button @click="activeModal = 'modal-add-phone'"
                            class="flex items-center justify-center gap-2 rounded-lg h-9 px-4 bg-primary hover:bg-primary-dark text-white text-sm font-bold shadow-md shadow-blue-500/20 transition-all no-underline whitespace-nowrap cursor-pointer">
                            <span class="material-symbols-outlined text-[18px]">add</span>
                            เพิ่มหน่วยงาน
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto custom-scrollbar rounded-lg border border-[#dbe1e6]">
                    <table class="min-w-full divide-y divide-[#dbe1e6]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[200px]"
                                    scope="col">หน่วยงาน / กลุ่มงาน</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[150px]"
                                    scope="col">เบอร์โทรศัพท์ (กลาง)</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[120px]"
                                    scope="col">เบอร์ต่อภายใน</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[150px]"
                                    scope="col">หมายเหตุ</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-[#5f788c] uppercase tracking-wider w-[100px]"
                                    scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#f0f3f5]">
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-[#111518]">ฝ่ายอำนวยการ</div>
                                    <div class="text-xs text-[#5f788c]">สำนักงานเลขานุการกรม</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#111518]">02-141-5000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">1234</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5f788c]">-</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            class="text-gray-400 hover:text-primary p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button
                                            class="text-gray-400 hover:text-red-600 p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-[#111518]">กลุ่มงานคลังและพัสดุ</div>
                                    <div class="text-xs text-[#5f788c]">ฝ่ายบริหารทั่วไป</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#111518]">02-141-5000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">1235, 1236</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5f788c]">ติดต่อเรื่องเบิกจ่าย</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            class="text-gray-400 hover:text-primary p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button
                                            class="text-gray-400 hover:text-red-600 p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-[#111518]">ศูนย์เทคโนโลยีสารสนเทศ</div>
                                    <div class="text-xs text-[#5f788c]">Support IT</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#111518]">02-141-6000</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-primary font-bold">9999</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5f788c]">แจ้งซ่อม/ปัญหา</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            class="text-gray-400 hover:text-primary p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button
                                            class="text-gray-400 hover:text-red-600 p-1 rounded-md transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-[#dbe1e6] shadow-sm p-4 md:p-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                    <h3 class="text-lg md:text-xl font-bold text-[#111518] flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">share</span> โซเชียลมีเดีย
                    </h3>
                    <button @click="activeModal = 'modal-add-social'"
                        class="flex items-center justify-center gap-2 rounded-lg h-9 px-4 bg-white border border-gray-200 text-[#111518] hover:bg-gray-50 text-sm font-bold transition-all no-underline cursor-pointer w-full sm:w-auto">
                        <span class="material-symbols-outlined text-[18px]">add_link</span>
                        เพิ่มช่องทาง
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div
                        class="border border-gray-200 rounded-lg p-4 flex items-center justify-between hover:border-blue-400 hover:shadow-md transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-12 rounded-full bg-blue-600 text-white flex items-center justify-center shrink-0">
                                <svg aria-hidden="true" class="size-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path clip-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-sm font-bold text-[#111518] truncate">Facebook Page</h4>
                                <a class="text-xs text-primary hover:underline truncate block"
                                    href="#">@PJOfficeOfficial</a>
                            </div>
                        </div>
                        <div class="flex gap-2 shrink-0">
                            <button class="text-gray-400 hover:text-primary"><span
                                    class="material-symbols-outlined text-[20px]">edit</span></button>
                        </div>
                    </div>
                    <div
                        class="border border-gray-200 rounded-lg p-4 flex items-center justify-between hover:border-green-400 hover:shadow-md transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-12 rounded-full bg-[#06C755] text-white flex items-center justify-center shrink-0">
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22 10.6c0-4.8-5-8.6-10-8.6S2 5.8 2 10.6c0 4.2 3.7 7.7 8.5 8.4l.7 2.2c.1.4.3.5.6.3.3-.2 1.9-1.3 3.9-3.2 2.6-.9 6.3-3.8 6.3-7.7zm-12.8 2c-.2 0-.3-.1-.3-.3V9.6c0-.2.1-.3.3-.3s.3.1.3.3v1.8h1.8c.2 0 .3.1.3.3s-.1.3-.3.3H9.2zm6.6-.3c0 .2-.1.3-.3.3s-.3-.1-.3-.3v-2.7c0-.2.1-.3.3-.3s.3.1.3.3v2.7zm-2.1 0c0 .2-.1.3-.3.3s-.3-.1-.3-.3V9.6c0-.2.1-.3.3s.3.1.3.3v2.7zm5.2 0c0 .2-.1.3-.3.3H17c-.2 0-.3-.1-.3-.3V9.6c0-.2.1-.3.3-.3H18.6c.2 0 .3.1.3.3s-.1.3-.3.3h-1.5v.9h1.5c.2 0 .3.1.3.3s-.1.3-.3.3h-1.5v.9h1.5c.2 0 .3.1.3.3z">
                                    </path>
                                </svg>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-sm font-bold text-[#111518] truncate">Line Official</h4>
                                <a class="text-xs text-primary hover:underline truncate block" href="#">@PJ_Service</a>
                            </div>
                        </div>
                        <div class="flex gap-2 shrink-0">
                            <button class="text-gray-400 hover:text-primary"><span
                                    class="material-symbols-outlined text-[20px]">edit</span></button>
                        </div>
                    </div>
                    <div
                        class="border border-gray-200 rounded-lg p-4 flex items-center justify-between hover:border-purple-400 hover:shadow-md transition-all">
                        <div class="flex items-center gap-4">
                            <div
                                class="size-12 rounded-full bg-purple-600 text-white flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[28px]">language</span>
                            </div>
                            <div class="overflow-hidden">
                                <h4 class="text-sm font-bold text-[#111518] truncate">Website</h4>
                                <a class="text-xs text-primary hover:underline truncate block"
                                    href="#">www.pj-office.go.th</a>
                            </div>
                        </div>
                        <div class="flex gap-2 shrink-0">
                            <button class="text-gray-400 hover:text-primary"><span
                                    class="material-symbols-outlined text-[20px]">edit</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-cloak x-show="activeModal === 'modal-edit-main'"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="activeModal = null"></div>
            <div
                class="bg-white rounded-xl shadow-2xl w-full max-w-2xl relative z-10 flex flex-col max-h-[90vh] modal-content m-4">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-[24px]">edit_square</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#111518]">แก้ไขข้อมูลติดต่อหลัก</h3>
                            <p class="text-xs text-[#5f788c]">ปรับปรุงข้อมูลที่อยู่และเบอร์โทรศัพท์ของหน่วยงาน</p>
                        </div>
                    </div>
                    <button @click="activeModal = null"
                        class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100">
                        <span class="material-symbols-outlined text-[24px]">close</span>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                    <form class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ที่อยู่หน่วยงาน</label>
                            <textarea
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                rows="3">เลขที่ 999 ถนนแจ้งวัฒนะ แขวงทุ่งสองห้อง เขตหลักสี่ กรุงเทพมหานคร 10210</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    type="text" value="02-141-5555" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">โทรสาร (Fax)</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    type="text" value="02-143-9999" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    type="email" value="contact@pj-office.go.th" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">เว็บไซต์</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    type="url" value="www.pj-office.go.th" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3 rounded-b-xl">
                    <button @click="activeModal = null"
                        class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium text-sm hover:bg-gray-50 transition-colors">ยกเลิก</button>
                    <button
                        class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium text-sm hover:bg-primary-dark shadow-md shadow-blue-500/20 transition-all transform active:scale-95">บันทึกการเปลี่ยนแปลง</button>
                </div>
            </div>
        </div>

        <div x-cloak x-show="activeModal === 'modal-add-phone'"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="activeModal = null"></div>
            <div
                class="bg-white rounded-xl shadow-2xl w-full max-w-lg relative z-10 flex flex-col max-h-[90vh] modal-content m-4">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-[24px]">add_call</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#111518]">เพิ่มเบอร์โทรศัพท์ภายใน</h3>
                            <p class="text-xs text-[#5f788c]">เพิ่มข้อมูลการติดต่อของหน่วยงานย่อย</p>
                        </div>
                    </div>
                    <button @click="activeModal = null"
                        class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100">
                        <span class="material-symbols-outlined text-[24px]">close</span>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                    <form class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อหน่วยงาน / กลุ่มงาน</label>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                placeholder="เช่น ฝ่ายการเงิน" type="text" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">สังกัด (ถ้ามี)</label>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                placeholder="เช่น สำนักปลัด" type="text" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์ (กลาง)</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    placeholder="02-xxx-xxxx" type="tel" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">เบอร์ต่อภายใน</label>
                                <input
                                    class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                    placeholder="เช่น 1234" type="text" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">หมายเหตุ</label>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                placeholder="เช่น ติดต่อเรื่อง..." type="text" />
                        </div>
                    </form>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3 rounded-b-xl">
                    <button @click="activeModal = null"
                        class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium text-sm hover:bg-gray-50 transition-colors">ยกเลิก</button>
                    <button
                        class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium text-sm hover:bg-primary-dark shadow-md shadow-blue-500/20 transition-all transform active:scale-95">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>

        <div x-cloak x-show="activeModal === 'modal-add-social'"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="activeModal = null"></div>
            <div
                class="bg-white rounded-xl shadow-2xl w-full max-w-lg relative z-10 flex flex-col max-h-[90vh] modal-content m-4">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-[24px]">add_link</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-[#111518]">เพิ่มช่องทางโซเชียลมีเดีย</h3>
                            <p class="text-xs text-[#5f788c]">เชื่อมต่อช่องทางการสื่อสารเพิ่มเติม</p>
                        </div>
                    </div>
                    <button @click="activeModal = null"
                        class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100">
                        <span class="material-symbols-outlined text-[24px]">close</span>
                    </button>
                </div>
                <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                    <form class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ประเภทแพลตฟอร์ม</label>
                            <select
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                                <option value="">เลือกแพลตฟอร์ม...</option>
                                <option value="facebook">Facebook</option>
                                <option value="line">Line</option>
                                <option value="twitter">X (Twitter)</option>
                                <option value="website">Website</option>
                                <option value="tiktok">TikTok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อที่แสดง (Display Name)</label>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                placeholder="เช่น PJOfficeOfficial" type="text" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ลิงก์ (URL)</label>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                                placeholder="https://..." type="url" />
                        </div>
                    </form>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3 rounded-b-xl">
                    <button @click="activeModal = null"
                        class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium text-sm hover:bg-gray-50 transition-colors">ยกเลิก</button>
                    <button
                        class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium text-sm hover:bg-primary-dark shadow-md shadow-blue-500/20 transition-all transform active:scale-95">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
@endsection