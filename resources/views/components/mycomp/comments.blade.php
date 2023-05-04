<div class="box-comments">
    <h2>Comentarios</h2>
    <form method="post" action="{{ route('comments.store') }}">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">
      <textarea name="comment" placeholder="Escribe un comentario"></textarea>
      <button type="submit">Enviar</button>
    </form>
      <br>
      @if($comments->count() > 0)
        <div class="comment-list">
          @foreach($comments as $comment)
            <div class="comment">
              <div class="comment-info">
                <img src="{{ $comment->users->profile_photo_url }}" alt="{{ $comment->users->name }}" class="comment-img rounded-full h-20 w-20 object-cover" id="icon-user">
                <h5>{{ $comment->users->name }}</h5>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
              </div>
              <p>{{ $comment->comentario }}</p>
            </div>
           
                        
          @endforeach
        </div>
      @else
        <p class="noncomments">No hay comentarios aún.</p>
      @endif
    </div>
    
</div>