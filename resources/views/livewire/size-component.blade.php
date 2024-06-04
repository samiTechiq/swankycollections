<div>
    <div class="d-flex justify-content-between align-items-center border p-2 bg-light">
        <p class="m-0 fw-bold">Sizes</p>
        <button type="button" class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            ADD
        </button>
    </div>
    <table class="table table-hover" style="width: 100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sizes as $size)
                <tr :key="$size->id">
                    <td>{{ $size->name }}</td>
                    <td>
                        @if ($size->status == 1)
                            <span class="badge bg-success">Acive</span>
                        @else
                            <span class="badge bg-danger">Inacive</span>
                        @endif
                    </td>
                    <td>
                        <button wire:click="edit({{ $size->id }})" class="badge bg-warning border-0">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button wire:click="delete({{ $size->id }})"
                            wire:confirm="Are you sure? You won't be able to revert this action."
                            class="badge bg-danger border-0">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align: center">No Size for this product yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product Size</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <form wire:submit="save">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <input type="hidden" wire:model="product_id" class="form-control">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select wire:model="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">--select--</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
       </form>
      </div>
    </div>
  </div>
  <!-- Modal edit -->
  <div wire:ignore.self class="modal fade" id="sizeEditModal" tabindex="-1" aria-labelledby="sizeEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Product Size</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       <form wire:submit="update">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="editName">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select wire:model="editStatus" class="form-select @error('status') is-invalid @enderror">
                    <option value="">--select--</option>
                    <option value="1" @selected($editStatus == 1)>Active</option>
                    <option value="0" @selected($editStatus == 0)>Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
                <span wire:loading.remove>Save changes</span>
                <span wire:loading>Please wait...</span>
            </button>
          </div>
       </form>
      </div>
    </div>
  </div>
</div>


