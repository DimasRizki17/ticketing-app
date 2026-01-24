<x-layouts.admin title="Edit Tipe Pembayaran">
    <div class="container mx-auto p-10 max-w-xl">
        <h1 class="text-3xl font-semibold mb-6">Edit Tipe Pembayaran</h1>

        <div class="bg-white p-6 rounded-box shadow-xs">
            <form action="{{ route('admin.payment-types.update', $paymentType->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="label">
                        <span class="label-text">Nama Tipe Pembayaran</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $paymentType->name) }}"
                        class="input input-bordered w-full"
                        required
                    >
                    @error('name')
                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.payment-types.index') }}"
                       class="btn btn-outline btn-sm">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-warning btn-sm text-white">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
