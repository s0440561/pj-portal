@extends('layouts.app')

@section('title', 'รายชื่อศูนย์ยุติธรรมชุมชนจังหวัดเชียงใหม่')

@section('content')
    <main class="flex-grow flex flex-col items-center justify-start p-4 md:p-8" x-data="centerApp()">
        <div class="layout-content-container flex w-full max-w-[1200px] flex-col">

            <div class="flex flex-wrap gap-2 px-1 mb-4">
                <a class="text-[#5f788c] hover:text-primary text-sm font-medium leading-normal flex items-center gap-1"
                    href="{{ route('home') }}">
                    <span class="material-symbols-outlined text-[16px]">home</span> หน้าหลัก
                </a>
                <span class="text-[#5f788c] text-sm font-medium">/</span>
                <span class="text-primary text-sm font-medium">ยุติธรรมชุมชน</span>
                <span class="text-[#5f788c] text-sm font-medium">/</span>
                <span class="text-slate-900 text-sm font-bold">จังหวัดเชียงใหม่</span>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-5 mb-8">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#111518] text-[32px] font-bold leading-tight tracking-[-0.02em]">ศูนย์ยุติธรรมชุมชน
                        จังหวัดเชียงใหม่</h1>
                    <p class="text-[#5f788c] text-base">กำลังแสดงศูนย์ทั้งหมด <span class="text-primary font-bold">25</span>
                        แห่ง ภายในจังหวัดเชียงใหม่</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('justice-center.add') }}"
                        class="flex items-center justify-center gap-2 rounded-xl h-10 px-4 bg-primary hover:bg-primary-dark text-white text-sm font-bold shadow-lg transition-all no-underline">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        เพิ่มศูนย์ใหม่
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-[#dbe1e6] shadow-sm overflow-hidden">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="min-w-full divide-y divide-[#dbe1e6]">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase">#</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase">
                                    ชื่อศูนย์ยุติธรรมชุมชน</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase">สถานที่ตั้ง /
                                    อำเภอ</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase">ประธานศูนย์ฯ
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-[#5f788c] uppercase">สถานะ</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-[#5f788c] uppercase">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f0f3f5]">
                            <template x-for="(center, index) in centers" :key="center.id">
                                <tr class="hover:bg-blue-50/20 transition-colors">
                                    <td class="px-6 py-4 text-sm text-slate-400" x-text="index + 1"></td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-bold text-slate-900" x-text="center.name"></div>
                                        <div class="text-[11px] text-primary" x-text="center.code"></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-700" x-text="center.subdistrict"></div>
                                        <div class="text-xs text-slate-500" x-text="'อ.' + center.district"></div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-slate-800" x-text="center.president"></div>
                                        <div class="text-xs text-slate-500 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">call</span>
                                            <span x-text="center.phone"></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span
                                            class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-green-100 text-green-700"
                                            x-text="center.status"></span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button @click="openEditModal(center)"
                                            class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-primary hover:bg-primary hover:text-white transition-all text-xs font-bold">
                                            <span class="material-symbols-outlined text-[16px]">edit</span>
                                            จัดการข้อมูล
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="editModalOpen" class="fixed inset-0 z-[100] flex items-center justify-center p-4"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-cloak>

            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="editModalOpen = false"></div>

            <div
                class="bg-white w-full max-w-5xl rounded-2xl shadow-2xl relative z-10 flex flex-col max-h-[95vh] overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-white sticky top-0">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center">
                            <span class="material-symbols-outlined">edit_square</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900" x-text="'แก้ไขข้อมูล: ' + editingCenter.name"></h3>
                            <p class="text-xs text-slate-500">ปรับปรุงรายละเอียดและที่ตั้งศูนย์ยุติธรรมชุมชน</p>
                        </div>
                    </div>
                    <button @click="editModalOpen = false"
                        class="text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <div class="p-6 md:p-8 overflow-y-auto custom-scrollbar bg-slate-50/30">
                    <form class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <section>
                                <h4 class="text-primary font-bold text-sm mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg">info</span> ข้อมูลพื้นฐาน
                                </h4>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-sm font-semibold">ชื่อศูนย์ยุติธรรมชุมชน <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" x-model="editingCenter.name"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-primary outline-none">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex flex-col gap-2">
                                            <label class="text-slate-700 text-sm font-semibold">รหัสศูนย์ (Code)</label>
                                            <input type="text" x-model="editingCenter.code"
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                        </div>
                                        <div class="flex flex-col gap-2">
                                            <label class="text-slate-700 text-sm font-semibold">สถานะ</label>
                                            <select
                                                class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                                <option value="เปิดทำการ">เปิดทำการ</option>
                                                <option value="ปรับปรุง">ปรับปรุง/หยุดพัก</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h4 class="text-primary font-bold text-sm mb-4 flex items-center gap-2 border-t pt-6">
                                    <span class="material-symbols-outlined text-lg">location_on</span> รายละเอียดที่อยู่
                                </h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-sm font-semibold">ตำบล</label>
                                        <input type="text" x-model="editingCenter.subdistrict"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-sm font-semibold">อำเภอ</label>
                                        <input type="text" x-model="editingCenter.district"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                    </div>
                                </div>
                            </section>

                            <section>
                                <h4 class="text-primary font-bold text-sm mb-4 flex items-center gap-2 border-t pt-6">
                                    <span class="material-symbols-outlined text-lg">person</span> ข้อมูลผู้ติดต่อ
                                </h4>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-sm font-semibold">ชื่อประธานศูนย์ฯ</label>
                                        <input type="text" x-model="editingCenter.president"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-sm font-semibold">เบอร์โทรศัพท์</label>
                                        <input type="text" x-model="editingCenter.phone"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm">
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="space-y-6">
                            <section>
                                <h4 class="text-primary font-bold text-sm mb-4 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg">map</span> จัดการตำแหน่งแผนที่ (Map)
                                </h4>

                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-xs font-bold uppercase">ละติจูด (Latitude)</label>
                                        <input type="text" placeholder="18.xxxx"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm font-mono focus:border-primary">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label class="text-slate-700 text-xs font-bold uppercase">ลองจิจูด
                                            (Longitude)</label>
                                        <input type="text" placeholder="98.xxxx"
                                            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm font-mono focus:border-primary">
                                    </div>
                                </div>

                                <button type="button"
                                    class="w-full mb-4 flex items-center justify-center gap-2 py-2 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-lg transition-colors border border-slate-200">
                                    <span class="material-symbols-outlined text-sm">my_location</span>
                                    ดึงพิกัดจากตำแหน่งปัจจุบัน
                                </button>

                                <div class="flex flex-col gap-2 mb-4">
                                    <label class="text-slate-700 text-sm font-semibold">ลิงก์ Google Maps (URL)</label>
                                    <input type="text" placeholder="https://goo.gl/maps/..."
                                        class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2 text-sm focus:ring-1 focus:ring-primary outline-none">
                                </div>

                                <div
                                    class="relative w-full aspect-video rounded-xl border-2 border-slate-200 bg-slate-100 overflow-hidden flex items-center justify-center group">
                                    <div
                                        class="absolute inset-0 opacity-40 bg-[url('https://www.google.com/maps/vt/pb=!1m4!1m3!1i12!2i3258!3i1622!2m3!1e0!2sm!3i610115663!3m8!2sth!3sen!5e1105!12m4!1e68!2m2!1sset!2sRoadmap!4e0!5m1!5f2')] bg-cover">
                                    </div>
                                    <div class="relative z-10 flex flex-col items-center gap-2">
                                        <span
                                            class="material-symbols-rounded text-primary text-4xl animate-bounce">location_on</span>
                                        <p class="text-xs font-bold text-slate-600 bg-white/80 px-2 py-1 rounded shadow-sm">
                                            ตัวอย่างการแสดงตำแหน่งในแผนที่</p>
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center cursor-crosshair">
                                        <span
                                            class="bg-white text-primary px-4 py-2 rounded-full text-xs font-bold shadow-lg">คลิกเพื่อเปลี่ยนตำแหน่ง</span>
                                    </div>
                                </div>
                                <p class="text-[10px] text-slate-400 mt-2 italic text-center">*
                                    พิกัดนี้จะถูกนำไปใช้ในระบบนำทางสำหรับเจ้าหน้าที่นิเทศ</p>
                            </section>

                            <section>
                                <h4 class="text-primary font-bold text-sm mb-4 flex items-center gap-2 border-t pt-6">
                                    <span class="material-symbols-outlined text-lg">image</span> รูปภาพศูนย์ / แผนผังที่ตั้ง
                                </h4>
                                <div
                                    class="w-full border-2 border-dashed border-slate-200 rounded-xl p-4 flex flex-col items-center bg-white hover:bg-slate-50 transition-colors cursor-pointer">
                                    <span
                                        class="material-symbols-outlined text-slate-300 text-3xl mb-1">add_photo_alternate</span>
                                    <span class="text-[11px] text-slate-400 font-medium">อัปโหลดภาพที่ตั้งศูนย์</span>
                                    <input type="file" class="hidden">
                                </div>
                            </section>
                        </div>
                    </form>
                </div>

                <div
                    class="px-6 py-4 border-t border-slate-100 flex items-center justify-end gap-3 bg-white sticky bottom-0">
                    <button @click="editModalOpen = false"
                        class="px-5 py-2 rounded-xl text-slate-500 font-bold hover:bg-slate-100 transition-all text-sm">ยกเลิก</button>
                    <button @click="saveData()"
                        class="px-8 py-2 rounded-xl bg-primary hover:bg-primary-dark text-white font-bold shadow-lg shadow-blue-100 transition-all transform active:scale-95 text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        บันทึกข้อมูลและพิกัด
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        function centerApp() {
            return {
                editModalOpen: false,
                editingCenter: {},

                centers: [
                    { id: 1, name: 'ศูนย์ยุติธรรมชุมชนเทศบาลนครเชียงใหม่', code: 'CJC-500101', subdistrict: 'ศรีภูมิ', district: 'เมืองเชียงใหม่', president: 'นายอัครเดช เชียงใหม่', phone: '081-111-XXXX', status: 'เปิดทำการ' },
                    { id: 2, name: 'ศูนย์ยุติธรรมชุมชนตำบลช้างเผือก', code: 'CJC-500102', subdistrict: 'ช้างเผือก', district: 'เมืองเชียงใหม่', president: 'นางสมศรี มีสุข', phone: '082-222-XXXX', status: 'เปิดทำการ' },
                    { id: 3, name: 'ศูนย์ยุติธรรมชุมชนตำบลริมใต้', code: 'CJC-500701', subdistrict: 'ริมใต้', district: 'แม่ริม', president: 'นายวิชัย ใจบุญ', phone: '083-333-XXXX', status: 'เปิดทำการ' }
                ],

                openEditModal(center) {
                    this.editingCenter = { ...center };
                    this.editModalOpen = true;
                },

                saveData() {
                    alert('บันทึกข้อมูลและพิกัดแผนที่ของ ' + this.editingCenter.name + ' เรียบร้อยแล้ว');
                    this.editModalOpen = false;
                }
            }
        }
    </script>
@endpush