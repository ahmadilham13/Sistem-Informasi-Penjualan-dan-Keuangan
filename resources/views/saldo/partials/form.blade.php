<form action="{{ route('saldo.store') }}" method="POST">
    @csrf
    @method('post')
    <div class="flex items-center mb-4">
        <label for="saldo" class="mr-2">Nominal:</label>
        <select id="saldo" name="saldo" class="border p-2 w-full">
            <option value="10000">Rp 10,000</option>
            <option value="25000">Rp 25,000</option>
            <option value="50000">Rp 50,000</option>
            <option value="100000">Rp 100,000</option>
            <option value="500000">Rp 500,000</option>
            <option value="1000000">Rp 1,000,000</option>
            {{-- <option value="custom">Nominal Custom</option> --}}
        </select>
    </div>


    <!-- Input untuk Nominal Custom -->
    <div id="customNominalInput" class="hidden flex items-center mb-4">
        <label for="saldo" class="mr-2">Nominal Custom:</label>
        <input type="number" id="saldo" name="saldo1" class="border p-2">
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('saldo')" />

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
        Tambah Saldo
    </button>
</form>

<script>
    document.getElementById('saldo').addEventListener('change', function() {
        var customInput = document.getElementById('customNominalInput');
        if (this.value === 'custom') {
            customInput.classList.remove('hidden');
        } else {
            customInput.classList.add('hidden');
        }
    });
</script>