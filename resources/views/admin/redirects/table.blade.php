<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th width="60">ID</th>
            <th>Old</th>
            <th>New</th>
            <th width="120">Type</th>
            <th width="70">Hits</th>
            <th width="150">Last Hit</th>
            <th width="90">Status</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($redirects as $item)
            <tr>
                <!-- ID -->
                <td>{{ $item->id }}</td>

                <!-- OLD VALUE -->
                <td>
                    @if($item->model === 'url')
                        /{{ $item->old_path }}
                    @else
                        {{ $item->old_slug }}
                    @endif
                </td>

                <!-- NEW VALUE -->
                <td>
                    @if($item->model === 'url')
                        @if($item->new_path)
                            /{{ $item->new_path }}
                        @else
                            <span class="text-danger">410 Gone</span>
                        @endif
                    @else
                        @if($item->new_slug)
                            {{ $item->new_slug }}
                        @else
                            <span class="text-danger">410 Gone</span>
                        @endif
                    @endif
                </td>

                <!-- TYPE -->
                <td>
                    @php
                        $labels = [
                            'products'  => 'Product',
                            'categories'=> 'Category',
                            'blog'      => 'Blog',
                            'pages'     => 'Page',
                            'services'  => 'Service',
                            'solutions' => 'Solution',
                            'url'       => 'Custom URL'
                        ];
                    @endphp

                    <span class="badge bg-info text-dark">
                        {{ $labels[$item->model] ?? ucfirst($item->model) }}
                    </span>
                </td>

                <!-- HITS -->
                <td>{{ $item->hits }}</td>

                <!-- LAST HIT -->
                <td>
                    @if($item->last_hit_at)
                        {{ $item->last_hit_at->diffForHumans() }}
                    @else
                        —
                    @endif
                </td>

                <!-- STATUS -->
                <td>
                    @if($item->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>

                <!-- ACTIONS -->
                <td>
                    <a href="{{ route('admin.redirects.edit', $item->id) }}"
                       class="btn btn-sm btn-info text-white me-1">
                        Edit
                    </a>

                    <form action="{{ route('admin.redirects.destroy', $item->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this redirect?');">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="8" class="text-center py-4">
                    No redirects found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- PAGINATION -->
<div class="mt-3">
    {{ $redirects->links() }}
</div>
