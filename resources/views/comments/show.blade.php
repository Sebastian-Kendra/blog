<comment-view :comment-data= '{{ $comment }}' inline-template>
    <article class="comment" >

        <div class="content" 
            :contenteditable="editing" 
            ref="comment" 
            @input='textChange'
            @keydown.enter='updateComment'
            @keydown.esc='notUpdate'
            @blur='notUpdate'
            >
            {{ $comment->text }}
        </div>

        <footer class="meta">
            <a href="/users/{{ $comment->user->id }}" class="author">
                @<strong>{{ $comment->user->name }}</strong>
            </a>
            <time datetime="{{ $comment->created_at->toW3cString() }}" class="has-text-grey">
                {{ $comment->created_at->diffForHumans() }}
            </time>

            @can ( 'update', $comment )
                <span class="controls has-text-gray">
                    <a class="edit" 
                        @click='startEdit'>edit</a>&nbsp
                    <a class="delete" @click='deleteComment'>x</a>
                </span>
            @endcan
        </footer>

    </article>
</comment-view>