<div class="col">
    <div class="card shadow-sm">
        <img src="{{ $post->image_url }}" alt="PostImage">
        <div class="card-body">
            <p class="card-text">{{ $post->body }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary">Author: {{ $post->user->name }}</small>
                <div class="btn-group">
                    <a href="/{{ $post->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</div>
