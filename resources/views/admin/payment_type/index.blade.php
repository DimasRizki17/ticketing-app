<x-layouts.admin title="Tipe Pembayaran">
    <div class="container mx-auto p-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-semibold">Tipe Pembayaran</h1>

            <a href="{{ route('admin.payment-types.create') }}"
               class="btn btn-primary btn-sm text-white">
                Tambah Tipe Pembayaran
            </a>
        </div>

        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tipe Pembayaran</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($paymentTypes as $index => $type)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->created_at->format('d M Y') }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('admin.payment-types.edit', $type->id) }}"
                                   class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>

                                <form action="{{ route('admin.payment-types.destroy', $type->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-error text-white">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Tidak ada tipe pembayaran tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
