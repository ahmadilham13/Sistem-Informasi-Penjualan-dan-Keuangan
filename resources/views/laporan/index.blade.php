<x-app-layout>

    <div class="container mx-auto my-8">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold">Laporan Penjualan</h1>
            {{-- <p class="text-4xl font-bold"></p> --}}
        </div>
        <div class="mb-4">
            <p class="text-lg font-semibold">Toko Rido Flower</p>
            <p>Andaleh, Kec. Batipuah, Kab. Tanah Datar</p>
            <p>Sumatera Barat</p>
            <!-- Tambahkan informasi perusahaan sesuai kebutuhan -->
            <hr class="border border-black"/>
        </div>

        <!-- Filter untuk Bulan dan Tahun -->
        {{-- <form action="{{ route(name: 'gaji.index', absolute: false) }}" method="get" class="flex items-center gap-3"> --}}
        <form action="{{ route(name: 'laporan.index', absolute: false) }}" method="get" class="flex items-center gap-3 mb-2 disabling-print">
            @csrf
            @method('get')
            <div>
                <x-text-input id="tanggal" class="block mt-1 w-full" type="text" name="tanggal" :value="old('tanggal', isset($dateSelect) ? $dateSelect : '')" placeholder="Tanggal" autofocus autocomplete="tanggal" />
            </div>
            <div>
                <x-select name="bulan" :options="$bulanOptions" :defaultValue="$bulanSelect" />
            </div>
            <div>
                <x-select name="tahun" :options="$tahunOptions" :defaultValue="$tahunSelect" />
            </div>
            <div class="gap-2">
                <x-button class="mt-2 disabling-print" type="submit" color="light-primary">{{ __('Filter') }}</x-button>
                @if (!empty($dateSelect) || !empty($bulanSelect) || !empty($tahunSelect))
                    <a href="{{ route('laporan.index') }}" class="bg-green-50 text-green-500 hover:bg-green-600 hover:text-white px-4
                    py-2 text-sm hover:shadow-xl transition duration-150 rounded-md mt-2 disabling-print">{{ __('Reset') }}</a>
                @endif
            </div>
        </form>

        <div class="hidden m-2 enabling-print">
            <span>Periode: {{ $periode }}</span>
        </div>

        @empty($data)
            <x-data-empty>
                {{ __('Select Date') }}
            </x-data-empty>
        @else
            <table class="w-full border-collapse border border-gray-400 mb-8 text-center text-[10px]">
                <thead>
                    <tr>
                        <th class="border border-gray-400 p-2">No</th>
                        <th class="border border-gray-400 p-2">Kode Transaksi</th>
                        <th class="border border-gray-400 p-2">Pembeli</th>
                        <th class="border border-gray-400 p-2">Bibit</th>
                        <th class="border border-gray-400 p-2">Quantity</th>
                        <th class="border border-gray-400 p-2">Total </th>
                        <th class="border border-gray-400 p-2">Tanggal</th>
                        {{-- <th class="border border-gray-400 p-2">Petugas</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td class="border border-gray-400 p-2">{{$no}}</td>
                            <td class="border border-gray-400 p-2">{{$item['kode_transaksi']}}</td>
                            <td class="border border-gray-400 p-2">{{$item['customer_name']}}</td>
                            <td class="border border-gray-400 p-2">{{$item['product_bibit']['product_name']}}</td>
                            <td class="border border-gray-400 p-2">{{$item['quantity']}}</td>
                            <td class="border border-gray-400 p-2">Rp. {{ number_format($item['product_bibit']['harga_jual'] * $item['quantity'], 0, ',', '.') }}</td>
                            <td class="border border-gray-400 p-2">{{Carbon\Carbon::parse($item['created_at'])->format('d-M-Y')}}</td>
                            {{-- <td class="border border-gray-400 p-2">{{$item['user']['name']}}</td> --}}
                        </tr>                        
                        @php
                            $no++;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="border border-gray-400 p-2 font-semibold">Total</td>
                        <td class="border border-gray-400 p-2 font-semibold">{{$quantity}}</td>
                        <td class="border border-gray-400 p-2 font-semibold">Rp. {{number_format($total, 0, ',', '.')}}</td>
                        @if ($resultsTotal > 0)
                            <td class="border border-gray-400 p-2 bg-green-500">Keuntungan</td>
                            @else
                            <td class="border border-gray-400 p-2 bg-red-500">Kerugian</td>
                        @endif
                    </tr>
                </tfoot>
            </table>

            <!-- Penanggung Jawab dan Tanda Tangan -->
            <div class="hidden letter-signature enabling-print">
                <p>
                    Andaleh, <?php echo date("d-M-Y") ?>,<br>
                    <span>KEPALA PIMPINAN</span><br>
                    <span>Rido Flower</span>
                </p>
                <div>
                   <Br>
                   <br>
                   <br>
                    <div class="letter-signature-dots">
                        <div style="font-weight: bold;">
                            <strong class="underline">Rido Risti</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Cetak -->
            <button onclick="printPage()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded disabling-print">
                Cetak Laporan
            </button>
        @endempty
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>

</x-app-layout>