@extends('layouts.app')

@section('title', 'รายการข้อมูลการนิเทศ')

@section('content')
    <main class="flex-grow flex flex-col p-4 md:p-8" x-data="supervisionApp()">
        <div class="max-w-[1200px] mx-auto w-full flex flex-col gap-8">

            <div class="flex flex-col gap-4">
                <div class="flex items-center gap-2 text-sm text-slate-500">
                    <a href="#" class="hover:text-primary transition-colors">ยุติธรรมชุมชน</a>
                    <span class="material-symbols-outlined text-xs">chevron_right</span>
                    <span class="text-slate-900 font-medium">รายการฝึกอบรม/นิเทศ</span>
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight tracking-[-0.015em]">
                            ข้อมูลการนิเทศศูนย์ยุติธรรมชุมชน</h1>
                        <p class="text-slate-500 text-sm md:text-base mt-1">
                            ติดตามและตรวจสอบรายการลงพื้นที่นิเทศของสำนักงาน</p>
                    </div>
                    <a href="{{ route('training.add') }}"
                        class="flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-all transform active:scale-95 no-underline">
                        <span class="material-symbols-outlined">add_circle</span>
                        บันทึกการนิเทศใหม่
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 text-slate-600 text-xs uppercase font-bold border-b border-slate-100">
                                <th class="px-6 py-4">วันที่นิเทศ</th>
                                <th class="px-6 py-4">ชื่อศูนย์ยุติธรรมชุมชน</th>
                                <th class="px-6 py-4 text-center">รูปแบบ</th>
                                <th class="px-6 py-4 text-right">งบประมาณ</th>
                                <th class="px-6 py-4">ความต้องการป้าย</th>
                                <th class="px-6 py-4 text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-5">
                            <template x-for="item in supervisions" :key="item.id">
                                <tr class="hover:bg-blue-50/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700" x-text="item.date">
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-slate-900" x-text="item.centerName"></p>
                                        <p class="text-xs text-slate-500"
                                            x-text="'ผู้เข้าร่วม ' + item.participants + ' ท่าน'"></p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider border"
                                            :class="item.mode === 'onsite' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-purple-50 text-purple-600 border-purple-100'"
                                            x-text="item.mode === 'onsite' ? 'On-site' : 'Online'"></span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <p class="text-sm font-bold text-slate-900"
                                            x-text="item.budget > 0 ? '฿' + item.budget.toLocaleString() : 'ไม่ใช้'">
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1 text-xs"
                                            :class="item.signReq === 'needed' ? 'text-orange-600 font-semibold' : 'text-slate-400'">
                                            <span class="material-symbols-outlined text-sm"
                                                x-text="item.signReq === 'needed' ? 'cached' : 'remove_circle'"></span>
                                            <span x-text="item.signReq === 'needed' ? 'ต้องการ' : 'ไม่ต้องการ'"></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button @click="openManageModal(item)"
                                                class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 hover:bg-blue-50 hover:text-blue-600 transition-all border border-transparent hover:border-blue-100">
                                                <span class="material-symbols-outlined text-lg">edit</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="isModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" x-cloak>
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" @click="isModalOpen = false">
            </div>

            <div
                class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative z-10 flex flex-col max-h-[90vh] overflow-hidden transform transition-all">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-white">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-100">
                            <span class="material-symbols-outlined">edit_note</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">จัดการข้อมูลการนิเทศ</h2>
                            <p class="text-xs text-slate-500" x-text="selectedItem.centerName"></p>
                        </div>
                    </div>
                    <button @click="isModalOpen = false" class="text-slate-400 hover:text-slate-600 transition-colors"><span
                            class="material-symbols-outlined">close</span></button>
                </div>

                <div class="p-6 overflow-y-auto custom-scrollbar flex-1 bg-slate-50/30">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">จำนวนคณะกรรมการเข้าร่วม</label>
                            <input type="number" x-model="selectedItem.participants"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">วันที่นิเทศ</label>
                            <input type="text" x-model="selectedItem.date"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">งบประมาณ (บาท)</label>
                            <input type="number" x-model="selectedItem.budget"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">รูปแบบการนิเทศ</label>
                            <select x-model="selectedItem.mode"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all cursor-pointer">
                                <option value="onsite">ลงพื้นที่ (On-site)</option>
                                <option value="online">ประชุม/ปฏิบัติการ</option>
                            </select>
                        </div>
                        <div class="md:col-span-2 flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">ปัญหาอุปสรรค</label>
                            <textarea x-model="selectedItem.problem"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm h-20 resize-none focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                        </div>
                        <div class="md:col-span-2 flex flex-col gap-2">
                            <label class="text-slate-700 text-sm font-semibold">แนวทางแก้ไข</label>
                            <textarea x-model="selectedItem.solution"
                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm h-20 resize-none focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-slate-100 bg-white flex items-center justify-end gap-3">
                    <button @click="isModalOpen = false"
                        class="px-4 py-2 text-sm font-medium text-slate-500 hover:bg-slate-100 rounded-lg transition-colors">ยกเลิก</button>
                    <button @click="saveChanges()"
                        class="px-6 py-2 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg shadow-blue-100 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg">save</span>
                        บันทึกการเปลี่ยนแปลง
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function supervisionApp() {
            return {
                isModalOpen: false,
                selectedItem: {},
                // ข้อมูลตัวอย่างที่ "กรอกไว้แล้ว"
                supervisions: [
                    { id: 1, date: '12 ม.ค. 2569', centerName: 'ศูนย์ยุติธรรมชุมชนตำบลแม่สอด', participants: 15, mode: 'onsite', budget: 3500, signReq: 'needed', problem: 'การประสานงานในพื้นที่ยังล่าช้า', solution: 'เพิ่มช่องทางติดต่อผ่านกลุ่ม Line' },
                    { id: 2, date: '10 ม.ค. 2569', centerName: 'ศูนย์ยุติธรรมชุมชนตำบลปากน้ำ', participants: 8, mode: 'online', budget: 0, signReq: 'not-needed', problem: '-', solution: '-' },
                    { id: 3, date: '05 ม.ค. 2569', centerName: 'ศูนย์ยุติธรรมชุมชนตำบลในเมือง', participants: 12, mode: 'onsite', budget: 1800, signReq: 'needed', problem: 'ป้ายเดิมชำรุดจากสภาพอากาศ', solution: 'ประสานจัดทำป้ายวัสดุทนทานพิเศษ' }
                ],

                openManageModal(item) {
                    this.selectedItem = { ...item }; // Copy ข้อมูลไปที่ SelectedItem
                    this.isModalOpen = true;
                },

                saveChanges() {
                    // หา index ของรายการที่แก้ไข
                    const idx = this.supervisions.findIndex(i => i.id === this.selectedItem.id);
                    if (idx !== -1) {
                        this.supervisions[idx] = { ...this.selectedItem }; // อัปเดตข้อมูลในตาราง
                        alert('บันทึกการแก้ไขเรียบร้อยแล้ว');
                        this.isModalOpen = false;
                    }
                }
            }
        }
    </script>
@endpush