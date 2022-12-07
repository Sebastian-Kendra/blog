<form action="/comments" method="POST" class="add-comment-form">
    
    @csrf
    
    @include('errors')

    <div class="field">
        <label class="label">SSssprava</label>
        <div class="control">
            <textarea class="textarea" placeholder="Tu si piš" rows="4" name="text"></textarea>
        </div>

        <div class="control">
            <button class="button is-warning">Pridaj si komm.</button>
        </div>
    </div>

    <input type="hidden" name="post_id" value=" {{ $post->id }} ">

</form>