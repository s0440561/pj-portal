@extends('layouts.app')

@section('title', 'ข้อมูลอัตรากำลัง')

@php
    $activePage = 'power-rate';
@endphp

@push('styles')
    <style>
        .icon-filled {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
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
                <span class="text-primary text-sm font-medium leading-normal">ข้อมูลอัตรากำลัง</span>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-5 mb-8">
                <div class="flex flex-col gap-2">
                    <h1 class="text-[#111518] text-2xl md:text-[32px] font-black leading-tight tracking-[-0.02em]">
                        ข้อมูลอัตรากำลังของยุติธรรมจังหวัด</h1>
                    <p class="text-[#5f788c] text-sm md:text-base font-normal leading-normal max-w-2xl">
                        ภาพรวมและรายละเอียดอัตรากำลังบุคลากร แยกตามประเภทและสังกัด ประจำปีงบประมาณ 2567</p>
                </div>
                <div class="flex gap-2">
                    <button
                        class="flex items-center gap-2 rounded-lg bg-white border border-[#dbe1e6] px-4 py-2 text-sm font-bold text-[#111518] shadow-sm hover:bg-slate-50 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">print</span>
                        พิมพ์รายงาน
                    </button>
                    <button
                        class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-bold text-white shadow-md hover:bg-primary-dark transition-all cursor-pointer"
                        onclick="openModal()">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        เพิ่มอัตรากำลัง
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg p-4 border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="bg-indigo-50 text-indigo-600 size-12 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined icon-filled">groups</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">อัตรากำลังทั้งหมด</p>
                        <p class="text-2xl font-black text-[#111518]">58</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="bg-emerald-50 text-emerald-600 size-12 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined icon-filled">person_check</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">ปฏิบัติงานจริง</p>
                        <p class="text-2xl font-black text-[#111518]">53</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="bg-orange-50 text-orange-600 size-12 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined icon-filled">person_add</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">ตำแหน่งว่าง</p>
                        <p class="text-2xl font-black text-[#111518]">5</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg p-4 border border-slate-200 shadow-sm flex items-center gap-4">
                    <div class="bg-blue-50 text-primary size-12 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined icon-filled">pie_chart</span>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">ความครอบคลุม</p>
                        <p class="text-2xl font-black text-[#111518]">91.3%</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">

                <div class="flex flex-col rounded-xl bg-white border border-[#dbe1e6] shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-[#dbe1e6] flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="bg-indigo-600 w-1.5 h-6 rounded-full"></span>
                            <h3 class="text-lg font-bold text-[#111518]">1. ข้าราชการ</h3>
                        </div>
                        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold">รวม 20
                            อัตรา</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-white border-b border-slate-100">
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 w-1/3">
                                        ประเภท/ตำแหน่ง</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        กรอบ (Quota)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        มีจริง (Actual)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        ว่าง (Vacancy)</th>
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        สังกัด</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">
                                        ข้าราชการพลเรือนสามัญ
                                        <p class="text-xs text-slate-500 font-normal mt-0.5">Civil Servant</p>
                                    </td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">20</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">18</td>
                                    <td class="py-4 px-6 text-sm text-center text-red-500 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center">
                                        <span
                                            class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-600/10">ว่างบางส่วน</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-col rounded-xl bg-white border border-[#dbe1e6] shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-[#dbe1e6] flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="bg-teal-600 w-1.5 h-6 rounded-full"></span>
                            <h3 class="text-lg font-bold text-[#111518]">2. พนักงานราชการ</h3>
                        </div>
                        <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-xs font-bold">รวม 15
                            อัตรา</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-white border-b border-slate-100">
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 w-1/3">
                                        ประเภท/ตำแหน่ง</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        กรอบ (Quota)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        มีจริง (Actual)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        ว่าง (Vacancy)</th>
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        สังกัด</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">พนักงานราชการ</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">5</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">5</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">พนักงานราชการ สป.ยธ
                                    </td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">3</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">3</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สป.ยธ</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">พนักงานราชการ กคส.</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">กคส.</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">พนักงานราชการ
                                        กองทุนยุติธรรม</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">3</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">3</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">กองทุนยุติธรรม</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">พนักงานราชการ เฉพาะกิจ
                                    </td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-col rounded-xl bg-white border border-[#dbe1e6] shadow-sm overflow-hidden">
                    <div class="bg-slate-50 px-6 py-4 border-b border-[#dbe1e6] flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="bg-amber-500 w-1.5 h-6 rounded-full"></span>
                            <h3 class="text-lg font-bold text-[#111518]">3. ลูกจ้าง/จ้างเหมา</h3>
                        </div>
                        <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold">รวม 18
                            อัตรา</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-white border-b border-slate-100">
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 w-1/3">
                                        ประเภท/ตำแหน่ง</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        กรอบ (Quota)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        มีจริง (Actual)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        ว่าง (Vacancy)</th>
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        สังกัด</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">ลูกจ้างชั่วคราว</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">8</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">8</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">ลูกจ้างเหมาบริการ
                                        สป.ยธ.</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">6</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">4</td>
                                    <td class="py-4 px-6 text-sm text-center text-red-500 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สป.ยธ.</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-600/10">ว่างบางส่วน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">จ้างเหมาบริการ กคส.
                                    </td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">4</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">4</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">กคส.</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-col rounded-xl bg-white border border-[#dbe1e6] shadow-sm overflow-hidden mb-6">
                    <div class="bg-slate-50 px-6 py-4 border-b border-[#dbe1e6] flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <span class="bg-pink-500 w-1.5 h-6 rounded-full"></span>
                            <h3 class="text-lg font-bold text-[#111518]">4. บุคลากรสนับสนุน</h3>
                        </div>
                        <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs font-bold">รวม 5
                            อัตรา</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-white border-b border-slate-100">
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 w-1/3">
                                        ประเภท/ตำแหน่ง</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        กรอบ (Quota)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        มีจริง (Actual)</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        ว่าง (Vacancy)</th>
                                    <th class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        สังกัด</th>
                                    <th
                                        class="py-3 px-6 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">
                                        สถานะ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">แม่บ้าน/รปภ.</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">3</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-red-500 font-bold">1</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-600/10">ว่างบางส่วน</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-6 text-sm font-medium text-[#111518]">คนขับรถ</td>
                                    <td class="py-4 px-6 text-sm text-center font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-emerald-600 font-bold">2</td>
                                    <td class="py-4 px-6 text-sm text-center text-slate-400 font-bold">-</td>
                                    <td class="py-4 px-6 text-sm text-slate-600">สนง.ยุติธรรมจังหวัด</td>
                                    <td class="py-4 px-6 text-center"><span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">ครบตามจำนวน</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div aria-labelledby="modal-title" aria-modal="true" class="relative z-[100] hidden" id="addQuotaModal" role="dialog">
        <div class="fixed inset-0 bg-gray-900/75 transition-opacity backdrop-blur-sm"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl border border-slate-200">
                    <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">post_add</span>
                            เพิ่มข้อมูลอัตรากำลัง
                        </h3>
                        <button class="text-slate-400 hover:text-slate-500 transition-colors" onclick="closeModal()"
                            type="button">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                        <div class="mb-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2" for="quotaType">ประเภทอัตรากำลัง
                                <span class="text-red-500">*</span></label>
                            <select
                                class="block w-full rounded-md border-slate-300 py-2.5 px-3 text-slate-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                id="quotaType" onchange="handleTypeChange()">
                                <option value="">-- กรุณาเลือกประเภท --</option>
                                <option value="ข้าราชการ">ข้าราชการ</option>
                                <option value="พนักงานราชการ">พนักงานราชการ</option>
                                <option value="ลูกจ้าง/จ้างเหมา">ลูกจ้าง/จ้างเหมา</option>
                                <option value="บุคลากรสนับสนุน">บุคลากรสนับสนุน</option>
                            </select>
                        </div>
                        <div class="space-y-4" id="quotaRowsContainer">
                        </div>
                        <div class="mt-6">
                            <button
                                class="inline-flex items-center gap-2 rounded-md bg-blue-50 px-4 py-2 text-sm font-bold text-primary hover:bg-blue-100 transition-colors border border-dashed border-primary/30 w-full justify-center"
                                id="addRowBtn" onclick="addRow()" type="button">
                                <span class="material-symbols-outlined text-[20px]">add</span>
                                เพิ่มรายการ
                            </button>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse gap-3 border-t border-slate-200">
                        <button
                            class="inline-flex w-full justify-center rounded-md bg-primary px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-primary/90 sm:w-auto"
                            type="button">บันทึกข้อมูล</button>
                        <button
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-5 py-2.5 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-inset ring-slate-300 hover:bg-slate-50 sm:mt-0 sm:w-auto"
                            onclick="closeModal()" type="button">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const subCategories = {
            'ข้าราชการ': ['ข้าราชการ'],
            'พนักงานราชการ': ['พนักงานราชการ', 'พนักงานราชการ สป.ยธ', 'พนักงานราชการ กคส.', 'พนักงานราชการ กองทุนยุติธรรม',
                'พนักงานราชการ เฉพาะกิจ'
            ],
            'ลูกจ้าง/จ้างเหมา': ['ลูกจ้างชั่วคราว', 'ลูกจ้างเหมาบริการ สป.ยธ.', 'จ้างเหมาบริการ กคส.'],
            'บุคลากรสนับสนุน': ['แม่บ้าน/รปภ.', 'คนขับรถ']
        };

        let currentRowCount = 0;

        function openModal() {
            document.getElementById('addQuotaModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('addQuotaModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        function resetForm() {
            document.getElementById('quotaType').value = '';
            document.getElementById('quotaRowsContainer').innerHTML = '';
            currentRowCount = 0;
        }

        function handleTypeChange() {
            // Clear existing rows when type changes
            document.getElementById('quotaRowsContainer').innerHTML = '';
            currentRowCount = 0;

            // Automatically add one row for convenience
            const type = document.getElementById('quotaType').value;
            if (type) {
                addRow();
            }
        }

        function addRow() {
            const type = document.getElementById('quotaType').value;
            if (!type) {
                alert('กรุณาเลือกประเภทอัตรากำลังก่อน');
                return;
            }

            const container = document.getElementById('quotaRowsContainer');
            const options = subCategories[type] || [];
            const rowId = `row-${currentRowCount}`;

            let optionsHtml = '<option value="">-- เลือกรายการย่อย --</option>';
            options.forEach(opt => {
                optionsHtml += `<option value="${opt}">${opt}</option>`;
            });

            const rowHtml = `
                    <div id="${rowId}" class="p-4 rounded-lg bg-slate-50 border border-slate-200 relative animate-fade-in">
                        <button onclick="removeRow('${rowId}')" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 transition-colors" title="ลบรายการ">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                        </button>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                            <div class="md:col-span-3">
                                <label class="block text-xs font-bold text-slate-500 mb-1">รายการย่อย</label>
                                <select class="block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary">
                                    ${optionsHtml}
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-500 mb-1">กรอบ (Quota)</label>
                                <input type="number" min="0" oninput="calculateVacancy('${rowId}')" class="quota-input block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" placeholder="0">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-500 mb-1">มีจริง (Actual)</label>
                                <input type="number" min="0" oninput="calculateVacancy('${rowId}')" class="actual-input block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" placeholder="0">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-bold text-slate-500 mb-1">ว่าง (Vacancy)</label>
                                <input type="number" readonly class="vacancy-input block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-500 bg-slate-100 shadow-sm cursor-not-allowed" placeholder="0">
                            </div>
                            <div class="md:col-span-3">
                                <label class="block text-xs font-bold text-slate-500 mb-1">สังกัด</label>
                                <input type="text" class="block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" placeholder="ระบุสังกัด">
                            </div>
                            <div class="md:col-span-12">
                                 <label class="block text-xs font-bold text-slate-500 mb-1">หมายเหตุ</label>
                                <input type="text" class="block w-full rounded-md border-slate-300 py-2 px-3 text-sm text-slate-900 shadow-sm focus:border-primary focus:ring-primary" placeholder="ระบุหมายเหตุ (ถ้ามี)">
                            </div>
                        </div>
                    </div>
                `;

            const div = document.createElement('div');
            div.innerHTML = rowHtml;
            container.appendChild(div.firstElementChild);
            currentRowCount++;
        }

        function removeRow(rowId) {
            const row = document.getElementById(rowId);
            if (row) {
                row.remove();
            }
        }

        function calculateVacancy(rowId) {
            const row = document.getElementById(rowId);
            const quota = parseInt(row.querySelector('.quota-input').value) || 0;
            const actual = parseInt(row.querySelector('.actual-input').value) || 0;
            const vacancyInput = row.querySelector('.vacancy-input');

            const vacancy = quota - actual;
            vacancyInput.value = vacancy;

            // Visual feedback
            if (vacancy < 0) {
                vacancyInput.classList.add('text-red-500', 'font-bold');
                vacancyInput.classList.remove('text-slate-500');
            } else if (vacancy > 0) {
                vacancyInput.classList.add('text-emerald-600', 'font-bold');
                vacancyInput.classList.remove('text-slate-500');
            } else {
                vacancyInput.classList.remove('text-red-500', 'text-emerald-600', 'font-bold');
                vacancyInput.classList.add('text-slate-500');
            }
        }
    </script>
@endpush