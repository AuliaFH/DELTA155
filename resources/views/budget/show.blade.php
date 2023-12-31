@extends('layouts.app')

@section('content')
<x-header title="Lihat Anggaran" showCreate="true" link="api/budegts/create" />
<div class="row">
    <div class="col-md-6">
        <canvas id="budget"></canvas>
    </div>
    <div class="col-md-6 bg-white">
        <h4 class="mt-2"><strong id="budget-title">{{ $budget->title }}</strong></h4>
        <hr />
        <div>
            <strong>Alokasi Dana:</strong> <span class="format-amount"
                data-amount="{{ $budget->alloted_amount }}"></span>
        </div>
        <div>
            <strong>Pengeluaran:</strong> <span id="spendings" class="format-amount"
                data-amount="{{ $budget->alloted_amount - $budget->balance_amount }}"></span>
        </div>
        <div>
            <strong>Tabungan:</strong> <span id="savings" class="format-amount"
                data-amount="{{ $budget->balance_amount }}"></span>
        </div>
        <div>
            <strong>Tanggal Pengeluaran:</strong> {{ $budget->expiry_date->format('Y F d, l') }}
        </div>
        <div>
            <strong>Tanggal Dibuat:</strong> {{ $budget->created_at->format('Y F d, l') }}
        </div>
        <div class="row mt-4">
            <div class="col-sm-4">
                <div class="card rounded-0 text-white bg-primary mb-3">
                    <div class="card-header">Total Transaksi</div>
                    <div class="card-body flex-column">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">{{ $totalTransactions }}</h5>
                            </div>
                            <div class="col-auto ps-0">
                                <img src="{{ asset('icons/transaction.svg') }}" alt="transaction" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card rounded-0 text-white bg-success mb-3">
                    <div class="card-header">Transaksi Menguntungkan</div>
                    <div class="card-body flex-column">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">{{ $noOfIncomeTransactions }}</h5>
                            </div>
                            <div class="col-auto ps-0">
                                <img src="{{ asset('icons/credit-card.svg') }}" alt="proftable transaction" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card rounded-0 text-white bg-danger mb-3">
                    <div class="card-header">Transaksi Tidak Menguntungkan</div>
                    <div class="card-body flex-column">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">{{ $totalTransactions - $noOfIncomeTransactions }}</h5>
                            </div>
                            <div class="col-auto ps-0">
                                <img src="{{ asset('icons/credit-card.svg') }}" alt="unprofitable transaction"
                                    style="fill: red" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/accounting.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/budget.show.min.js') }}"></script>
@endsection