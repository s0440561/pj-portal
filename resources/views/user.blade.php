@extends('layouts.app')

@section('title', 'บุคลากร')

@php
    $activePage = 'user';
@endphp

@push('styles')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endpush

@section('content')
    <div class="flex h-full grow flex-col justify-center w-full">
        <div class="px-4 md:px-8 w-full max-w-[1440px] mx-auto py-8">

            <div class="flex flex-wrap gap-2 px-1 mb-2">
                <a class="text-[#5f788c] hover:text-primary text-sm font-medium leading-normal flex items-center gap-1"
                    href="{{ route('home') }}">
                    <span class="material-symbols-rounded text-[16px]">home</span> หน้าหลัก
                </a>
                <span class="text-[#5f788c] text-sm font-medium leading-normal">/</span>
                <span class="text-primary text-sm font-medium leading-normal">บุคลากร</span>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-5 mb-8">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#111518] text-2xl md:text-[32px] font-bold leading-tight tracking-[-0.02em]">
                        บุคลากร (Personnel)</h1>
                    <p class="text-[#5f788c] text-sm md:text-base font-normal leading-normal max-w-2xl">
                        จัดการข้อมูลเจ้าหน้าที่ ข้าราชการ พนักงาน และลูกจ้างในสังกัดกระทรวงยุติธรรม</p>
                </div>
                <a class="flex items-center justify-center gap-2 rounded-lg h-10 px-5 bg-primary hover:bg-primary-dark text-white text-sm font-bold shadow-md shadow-blue-500/20 transition-all transform active:scale-95 no-underline shrink-0"
                    href="#modal-add-personnel">
                    <span class="material-symbols-rounded text-[20px]">person_add</span>
                    <span class="whitespace-nowrap">เพิ่มบุคลากรใหม่</span>
                </a>
            </div>

            <div class="bg-white rounded-xl border border-[#dbe1e6] shadow-sm p-4 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4">
                    <div class="lg:col-span-4 relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-[#9ca3af]">search</span>
                        </div>
                        <input
                            class="block w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-lg leading-5 bg-gray-50 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm"
                            placeholder="ค้นหาจากชื่อ, รหัส, หรือตำแหน่ง..." type="text" />
                    </div>
                    <div class="lg:col-span-3">
                        <select
                            class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-200 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-lg bg-white">
                            <option>สังกัดทั้งหมด</option>
                            <option>สำนักงานปลัดกระทรวงยุติธรรม</option>
                            <option>กรมคุมประพฤติ</option>
                            <option>กรมบังคับคดี</option>
                        </select>
                    </div>
                    <div class="lg:col-span-3">
                        <select
                            class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-200 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-lg bg-white">
                            <option>สถานะทั้งหมด</option>
                            <option>ปฏิบัติงาน</option>
                            <option>ช่วยราชการ</option>
                            <option>ลาออก/พ้นสภาพ</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2 flex justify-end">
                        <button
                            class="w-full flex items-center justify-center gap-2 rounded-lg bg-[#f0f3f5] hover:bg-[#e2e8f0] text-[#111518] font-medium py-2.5 px-4 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">filter_list</span> กรองข้อมูล
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-1 bg-white rounded-xl border border-[#dbe1e6] shadow-sm overflow-hidden">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="min-w-full divide-y divide-[#dbe1e6]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider w-[100px]"
                                    scope="col">รหัส</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[240px]"
                                    scope="col">ชื่อ-สกุล</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[280px]"
                                    scope="col">ตำแหน่ง/สังกัด</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-[#5f788c] uppercase tracking-wider min-w-[200px]"
                                    scope="col">การติดต่อ</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-[#5f788c] uppercase tracking-wider w-[140px]"
                                    scope="col">สถานะ</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-[#5f788c] uppercase tracking-wider w-[160px]"
                                    scope="col">จัดการข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#f0f3f5]">
                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#5f788c]">PJ-1001
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="สมชาย ใจดี"
                                            class="h-10 w-10 flex-shrink-0 rounded-full object-cover border border-gray-200 mr-4">
                                        <div>
                                            <div class="text-sm font-bold text-[#111518]">นาย สมชาย ใจดี</div>
                                            <div class="text-xs text-[#5f788c]">พนักงานราชการ</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#111518] font-medium mb-1">นักวิชาการคอมพิวเตอร์</div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-icon-bg text-primary border border-blue-100">ฝ่ายอำนวยการ</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">call</span>
                                            081-234-5678
                                        </div>
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">mail</span>
                                            somchai.j@pj-office.go.th
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span> ปฏิบัติงาน
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="#modal-edit-personnel" onclick="setEditRow(this)"
                                            class="text-gray-400 hover:text-primary p-1.5 hover:bg-icon-bg rounded-md transition-colors inline-block"
                                            title="แก้ไข">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#5f788c]">PJ-1002
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="วรรณภา สุขสม"
                                            class="h-10 w-10 flex-shrink-0 rounded-full object-cover border border-gray-200 mr-4">
                                        <div>
                                            <div class="text-sm font-bold text-[#111518]">นางสาว วรรณภา สุขสม</div>
                                            <div class="text-xs text-[#5f788c]">ข้าราชการ</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#111518] font-medium mb-1">นักจัดการงานทั่วไป</div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-100">กรมบังคับคดี</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">call</span>
                                            089-876-5432
                                        </div>
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">mail</span>
                                            wannapa.s@pj-office.go.th
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-600"></span> ช่วยราชการ
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="#modal-edit-personnel" onclick="setEditRow(this)"
                                            class="text-gray-400 hover:text-primary p-1.5 hover:bg-icon-bg rounded-md transition-colors inline-block"
                                            title="แก้ไข">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#5f788c]">PJ-1003
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="ประดิษฐ์ คิดดี"
                                            class="h-10 w-10 flex-shrink-0 rounded-full object-cover border border-gray-200 mr-4">
                                        <div>
                                            <div class="text-sm font-bold text-[#111518]">นาย ประดิษฐ์ คิดดี</div>
                                            <div class="text-xs text-[#5f788c]">ข้าราชการระดับสูง</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#111518] font-medium mb-1">ยุติธรรมจังหวัด</div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 border border-indigo-100">สป.ยธ.</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">call</span>
                                            02-123-4567
                                        </div>
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">mail</span>
                                            pradit.k@pj-office.go.th
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span> ปฏิบัติงาน
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="#modal-edit-personnel" onclick="setEditRow(this)"
                                            class="text-gray-400 hover:text-primary p-1.5 hover:bg-icon-bg rounded-md transition-colors inline-block"
                                            title="แก้ไข">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#5f788c]">PJ-1004
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="สมศรี มีทรัพย์"
                                            class="h-10 w-10 flex-shrink-0 rounded-full object-cover border border-gray-200 mr-4">
                                        <div>
                                            <div class="text-sm font-bold text-gray-400">นาง สมศรี มีทรัพย์</div>
                                            <div class="text-xs text-[#5f788c]">พนักงานราชการ</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#111518] font-medium mb-1">พนักงานราชการ</div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">กรมคุ้มครองสิทธิ</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">mail</span>
                                            somsri@email.com
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span> ลาออก
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="#modal-edit-personnel" onclick="setEditRow(this)"
                                            class="text-gray-400 hover:text-primary p-1.5 hover:bg-icon-bg rounded-md transition-colors inline-block"
                                            title="แก้ไข">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="hover:bg-blue-50/50 transition-colors group">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#5f788c]">PJ-1005
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="กล้าหาญ ชาญชัย"
                                            class="h-10 w-10 flex-shrink-0 rounded-full object-cover border border-gray-200 mr-4">
                                        <div>
                                            <div class="text-sm font-bold text-[#111518]">นาย กล้าหาญ ชาญชัย</div>
                                            <div class="text-xs text-[#5f788c]">จ้างเหมาบริการ</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-[#111518] font-medium mb-1">พนักงานขับรถ</div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">สำนักงานยุติธรรม</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center text-sm text-[#5f788c]">
                                            <span
                                                class="material-symbols-outlined text-[16px] mr-2 text-primary/70">call</span>
                                            061-111-2222
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span> ปฏิบัติงาน
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div
                                        class="flex items-center justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="#modal-edit-personnel" onclick="setEditRow(this)"
                                            class="text-gray-400 hover:text-primary p-1.5 hover:bg-icon-bg rounded-md transition-colors inline-block"
                                            title="แก้ไข">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-white border-t border-[#dbe1e6] px-6 py-4 flex items-center justify-between">
                    <div class="text-sm text-[#5f788c]">
                        แสดง 1 ถึง 5 จาก 24 รายการ
                    </div>
                    <div class="flex items-center gap-1">
                        <button
                            class="flex size-8 items-center justify-center rounded-md border border-gray-200 hover:bg-gray-50 text-gray-500 disabled:opacity-50">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </button>
                        <button
                            class="flex size-8 items-center justify-center rounded-md bg-primary text-white text-sm font-medium">1</button>
                        <button
                            class="flex size-8 items-center justify-center rounded-md hover:bg-gray-50 text-gray-700 text-sm font-medium">2</button>
                        <button
                            class="flex size-8 items-center justify-center rounded-md hover:bg-gray-50 text-gray-700 text-sm font-medium">3</button>
                        <span class="flex size-8 items-center justify-center text-gray-500">...</span>
                        <button
                            class="flex size-8 items-center justify-center rounded-md hover:bg-gray-50 text-gray-700 text-sm font-medium">5</button>
                        <button
                            class="flex size-8 items-center justify-center rounded-md border border-gray-200 hover:bg-gray-50 text-gray-500">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding personnel -->
    <div class="fixed inset-0 z-50 hidden target:flex items-center justify-center bg-black/50 backdrop-blur-sm p-4 overflow-y-auto modal-overlay"
        id="modal-add-personnel">
        <a class="absolute inset-0 cursor-default" href="#"></a>
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl relative z-10 flex flex-col max-h-[90vh] modal-content">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="size-10 rounded-full bg-icon-bg flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-[24px]">person_add</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#111518]">เพิ่มบุคลากรใหม่</h3>
                        <p class="text-xs text-[#5f788c]">กรอกข้อมูลให้ครบถ้วนเพื่อสร้างบัญชีผู้ใช้ใหม่</p>
                    </div>
                </div>
                <a class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100" href="#">
                    <span class="material-symbols-outlined text-[24px]">close</span>
                </a>
            </div>

            <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                <form class="space-y-6">
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="size-10 rounded-full bg-icon-bg flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[20px]">person_add_alt</span>
                            </div>
                            <h4 class="text-lg font-bold text-[#111518]">ข้อมูลส่วนตัว</h4>
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-[#111518] mb-1">คำนำหน้าชื่อ <span
                                            class="text-red-500">*</span></label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3 placeholder:text-gray-400"
                                        placeholder="เช่น นาย, นาง, นางสาว" type="text" />
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-[#111518] mb-1">ชื่อ <span
                                            class="text-red-500">*</span></label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3 placeholder:text-gray-400"
                                        placeholder="ระบุชื่อจริง" type="text" />
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-[#111518] mb-1">นามสกุล <span
                                            class="text-red-500">*</span></label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3 placeholder:text-gray-400"
                                        placeholder="ระบุนามสกุล" type="text" />
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-[#111518] mb-1">เบอร์โทรศัพท์ <span
                                            class="text-red-500">*</span></label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3 placeholder:text-gray-400"
                                        placeholder="08x-xxx-xxxx" type="tel" />
                                </div>
                                <div class="col-span-1">
                                    <label class="block text-sm font-bold text-[#111518] mb-1">อีเมล <span
                                            class="text-red-500">*</span></label>
                                    <input
                                        class="w-full rounded-lg border-gray-200 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3 placeholder:text-gray-400"
                                        placeholder="example@email.com" type="email" />
                                </div>
                                <div class="md:col-span-2 mt-2">
                                    <label class="block text-sm font-bold text-[#111518] mb-2">สถานะการทำงาน</label>
                                    <div
                                        class="bg-gray-50 rounded-lg p-3 border border-gray-100 flex flex-wrap gap-4 items-center">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input checked=""
                                                class="form-radio text-green-500 focus:ring-green-500 h-5 w-5 border-gray-300"
                                                name="status" type="radio" />
                                            <span class="text-sm font-medium text-green-700">ปฏิบัติราชการ</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input
                                                class="form-radio text-amber-500 focus:ring-amber-500 h-5 w-5 border-gray-300"
                                                name="status" type="radio" />
                                            <span class="text-sm font-medium text-amber-700">ช่วยราชการ</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input
                                                class="form-radio text-gray-500 focus:ring-gray-500 h-5 w-5 border-gray-300"
                                                name="status" type="radio" />
                                            <span class="text-sm font-medium text-gray-600">ลาออก/พ้นสภาพ</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <label class="block text-sm font-bold text-[#111518] mb-1">รูปถ่ายโปรไฟล์</label>
                                <div
                                    class="border-2 border-dashed border-gray-300 rounded-xl h-full min-h-[200px] flex flex-col items-center justify-center bg-gray-50 hover:bg-icon-bg hover:border-blue-300 transition-all cursor-pointer group p-4">
                                    <div
                                        class="size-14 rounded-full bg-white shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                        <span
                                            class="material-symbols-outlined text-gray-400 group-hover:text-primary transition-colors text-[28px]">add_a_photo</span>
                                    </div>
                                    <p class="text-sm font-bold text-gray-600 group-hover:text-primary transition-colors">
                                        คลิกอัปโหลดรูปภาพ</p>
                                    <p class="text-xs text-gray-400 mt-1">รองรับ JPG, PNG</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-6">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="size-10 rounded-full bg-icon-bg flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined text-[20px]">work</span>
                            </div>
                            <h4 class="text-lg font-bold text-[#111518]">ข้อมูลตำแหน่งงาน</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-[#111518] mb-1">กลุ่ม/ฝ่าย <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full rounded-lg border-gray-200 bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 text-[#111518]">
                                    <option value="">เลือกกลุ่ม/ฝ่าย</option>
                                    <option>ฝ่ายอำนวยการ</option>
                                    <option>กลุ่มอำนวยความยุติธรรมและนิติการ</option>
                                    <option>กลุ่มพัฒนาและส่งเสริมระบบงานยุติธรรม</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-[#111518] mb-1">สังกัด <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full rounded-lg border-gray-200 bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 text-[#111518]">
                                    <option value="">เลือกสังกัด</option>
                                    <option>สำนักงานปลัดกระทรวงยุติธรรม</option>
                                    <option>กรมคุมประพฤติ</option>
                                    <option>กรมคุ้มครองสิทธิและเสรีภาพ</option>
                                    <option>กรมพินิจและคุ้มครองเด็กและเยาวชน</option>
                                    <option>กรมราชทัณฑ์</option>
                                    <option>กรมบังคับคดี</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-[#111518] mb-1">ตำแหน่ง <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full rounded-lg border-gray-200 bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 text-[#111518]">
                                    <option value="">เลือกตำแหน่ง</option>
                                    <option>ผู้อำนวยการสำนักงานยุติธรรมจังหวัด</option>
                                    <option>ยุติธรรมจังหวัด</option>
                                    <option>นักจัดการงานทั่วไป</option>
                                    <option>นักวิชาการคอมพิวเตอร์</option>
                                    <option>นิติกร</option>
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-[#111518] mb-1">ประเภทบุคลากร <span
                                        class="text-red-500">*</span></label>
                                <select
                                    class="w-full rounded-lg border-gray-200 bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 text-[#111518]">
                                    <option value="">เลือกประเภทบุคลากร</option>
                                    <option>ข้าราชการ</option>
                                    <option>พนักงานราชการ</option>
                                    <option>พนักงานกองทุนยุติธรรม</option>
                                    <option>ลูกจ้างชั่วคราว</option>
                                    <option>จ้างเหมาบริการ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 bg-white border-t border-gray-100 flex justify-end gap-3 rounded-b-xl">
                <a class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium text-sm hover:bg-gray-50 transition-colors"
                    href="#">
                    ยกเลิก
                </a>
                <button
                    class="flex items-center gap-2 px-5 py-2.5 rounded-lg bg-primary text-white font-bold text-sm hover:bg-primary-dark shadow-md shadow-blue-500/20 transition-all transform active:scale-95">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    บันทึกข้อมูล
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for editing personnel -->
    <div class="fixed inset-0 z-50 hidden target:flex items-center justify-center bg-black/50 backdrop-blur-sm p-4 overflow-y-auto modal-overlay"
        id="modal-edit-personnel">
        <a class="absolute inset-0 cursor-default" href="#"></a>
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl relative z-10 flex flex-col max-h-[90vh] modal-content">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="size-10 rounded-full bg-amber-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-amber-600 text-[24px]">edit_square</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-[#111518]">แก้ไขข้อมูลบุคลากร</h3>
                        <p class="text-xs text-[#5f788c]">แก้ไขข้อมูลในระบบฐานข้อมูล</p>
                    </div>
                </div>
                <a class="text-gray-400 hover:text-gray-600 transition-colors rounded-full p-1 hover:bg-gray-100" href="#">
                    <span class="material-symbols-rounded text-[24px]">close</span>
                </a>
            </div>

            <div class="p-6 overflow-y-auto custom-scrollbar flex-1">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <h4
                            class="text-sm font-bold text-primary mb-4 flex items-center gap-2 pb-2 border-b border-gray-100">
                            <span class="material-symbols-rounded text-[18px]">image</span>
                            รูปประจำตัว
                        </h4>
                        <div class="flex flex-col sm:flex-row items-center gap-6">
                            <div class="relative group">
                                <div
                                    class="size-32 rounded-full bg-icon-bg flex items-center justify-center border-2 border-dashed border-primary/30 overflow-hidden">
                                    <img id="modal-preview-image" src="" alt="Profile Preview"
                                        class="w-full h-full object-cover">
                                </div>
                                <button type="button" onclick="document.getElementById('modal-upload-input').click()"
                                    class="absolute bottom-0 right-0 p-1.5 bg-white rounded-full shadow-md border border-gray-200 text-gray-500 hover:text-primary hover:bg-icon-bg transition-colors"
                                    title="Change">
                                    <span class="material-symbols-rounded text-[18px]">edit</span>
                                </button>
                            </div>
                            <div class="flex-1 w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">อัปโหลดรูปภาพโปรไฟล์ใหม่</label>
                                <div class="flex items-center w-full">
                                    <label
                                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-icon-bg hover:border-blue-300 transition-colors">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <span class="material-symbols-rounded text-gray-400 mb-1">cloud_upload</span>
                                            <p class="mb-1 text-sm text-gray-500"><span
                                                    class="font-semibold">คลิกเพื่ออัปโหลด</span></p>
                                        </div>
                                        <input id="modal-upload-input" class="hidden" type="file" accept="image/*"
                                            onchange="handleImageUpload(this)" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-2">
                        <h4
                            class="text-sm font-bold text-primary mb-4 flex items-center gap-2 pb-2 border-b border-gray-100">
                            <span class="material-symbols-rounded text-[18px]">badge</span>
                            ข้อมูลส่วนตัว
                        </h4>
                    </div>

                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">คำนำหน้าชื่อ</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option value="mr" selected>นาย</option>
                            <option value="mrs">นาง</option>
                            <option value="ms">นางสาว</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-นามสกุล</label>
                        <input
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 px-3"
                            value="สมชาย ใจดี" type="text" />
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทรศัพท์</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-2.5 text-gray-400 material-symbols-rounded text-[18px]">phone</span>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 pl-10 pr-3"
                                value="081-234-5678" type="tel" />
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                        <div class="relative">
                            <span
                                class="absolute left-3 top-2.5 text-gray-400 material-symbols-rounded text-[18px]">mail</span>
                            <input
                                class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5 pl-10 pr-3"
                                value="somchai.j@pj-office.go.th" type="email" />
                        </div>
                    </div>

                    <div class="md:col-span-2 mt-2">
                        <h4
                            class="text-sm font-bold text-primary mb-4 flex items-center gap-2 pb-2 border-b border-gray-100">
                            <span class="material-symbols-rounded text-[18px]">work</span>
                            ข้อมูลการทำงาน
                        </h4>
                    </div>

                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">ประเภทบุคลากร</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option>ข้าราชการ</option>
                            <option selected>พนักงานราชการ</option>
                            <option>ลูกจ้างชั่วคราว</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">สังกัด</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option selected>สำนักงานปลัดกระทรวงยุติธรรม</option>
                            <option>กรมคุมประพฤติ</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">ตำแหน่ง</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option selected>นักวิชาการคอมพิวเตอร์</option>
                            <option>นิติกร</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">กลุ่ม/ฝ่าย</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option selected>ฝ่ายอำนวยการ</option>
                            <option>กลุ่มอำนวยความยุติธรรม</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">สถานะ</label>
                        <select
                            class="w-full rounded-lg border-gray-200 bg-gray-50 focus:bg-white focus:border-primary focus:ring-1 focus:ring-primary text-sm py-2.5">
                            <option class="text-green-600 font-bold" value="active" selected>● ปฏิบัติงาน</option>
                            <option class="text-amber-600 font-bold" value="assist">● ช่วยราชการ</option>
                        </select>
                    </div>

                    <div class="md:col-span-2 mt-4 pt-6 border-t border-gray-100">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-red-50 border border-red-100">
                            <div class="flex-shrink-0 mt-1">
                                <span class="material-symbols-rounded text-red-500 text-[24px]">person_off</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-red-700">ปิดการใช้งาน / พ้นสภาพ</h4>
                                <p class="text-xs text-red-600/80 mt-1 mb-3">
                                    เมื่อเปิดใช้งานตัวเลือกนี้ บัญชีนี้จะไม่สามารถเข้าถึงระบบได้ และสถานะจะถูกปรับเป็น
                                    "ลาออก/พ้นสภาพ"
                                </p>
                                <div class="flex items-center gap-3">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="disable_user_check" class="sr-only peer">
                                        <div
                                            class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600">
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-gray-700">ยืนยันปิดการใช้งาน</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3 rounded-b-xl">
                <a class="px-5 py-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium text-sm hover:bg-gray-50 transition-colors"
                    href="#">ยกเลิก</a>
                <button onclick="saveEdit()"
                    class="px-5 py-2.5 rounded-lg bg-primary text-white font-medium text-sm hover:bg-primary-dark shadow-md shadow-blue-500/20 transition-all transform active:scale-95">บันทึกการเปลี่ยนแปลง</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentEditRow = null;

        // ฟังก์ชันเมื่อมีการเลือกไฟล์รูปภาพ
        function handleImageUpload(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // อัปเดต src ของรูปใน Modal ให้แสดงรูปที่เลือก
                    document.getElementById('modal-preview-image').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function setEditRow(button) {
            // เก็บค่าแถวปัจจุบันที่ถูกกดแก้ไข
            currentEditRow = button.closest('tr');

            // ดึงรูปจากแถวที่กด มาแสดงใน Modal เพื่อให้เห็นว่าเป็นคนเดิม
            if (currentEditRow) {
                const rowImg = currentEditRow.querySelector('img').src;
                document.getElementById('modal-preview-image').src = rowImg;
            }
        }

        function saveEdit() {
            // 1. ตรวจสอบ Checkbox ปิดการใช้งาน
            const disableCheckbox = document.getElementById('disable_user_check');
            const isDisabled = disableCheckbox ? disableCheckbox.checked : false;

            // 2. ตรวจสอบว่ามีการเปลี่ยนรูปหรือไม่ (ใน Demo นี้เราจะเอารูปจาก Modal ไปใส่ในตารางเลย)
            const newImgSrc = document.getElementById('modal-preview-image').src;

            if (currentEditRow) {
                // อัปเดตรูปในตาราง
                const tableImg = currentEditRow.querySelector('img');
                if (tableImg) {
                    tableImg.src = newImgSrc;
                }

                // ถ้าเลือกปิดการใช้งาน ให้เปลี่ยนสถานะในตาราง
                if (isDisabled) {
                    // คอลัมน์สถานะคือ index ที่ 4 (เริ่มนับจาก 0)
                    const statusCell = currentEditRow.querySelectorAll('td')[4];
                    if (statusCell) {
                        statusCell.innerHTML = `
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-100">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span> ลาออก/พ้นสภาพ
                                    </span>
                                `;
                        // ทำให้แถวดูจางลงเล็กน้อยเพื่อบ่งบอกสถานะ Inactive
                        currentEditRow.classList.add('opacity-60', 'bg-gray-50');
                    }
                    alert("บันทึกสำเร็จ: บัญชีผู้ใช้ถูกปิดการใช้งานและสถานะถูกปรับเป็น 'ลาออก/พ้นสภาพ' เรียบร้อยแล้ว");
                } else {
                    alert("บันทึกข้อมูลการเปลี่ยนแปลงเรียบร้อยแล้ว");
                }
            }

            // 3. ปิด Modal
            window.location.hash = "";

            // รีเซ็ตค่า Checkbox สำหรับครั้งถัดไป
            if (disableCheckbox) disableCheckbox.checked = false;
            currentEditRow = null;
        }
    </script>
@endpush