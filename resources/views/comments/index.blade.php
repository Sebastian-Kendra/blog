<section id="comments" class="section comments columns is-centered">
	<ol class="is-size-5 column is-three-quarters">

        @auth
            <comment-create :post-id= '{{ $post->id }}'> 
            </comment-create>
        @endauth

        <comment-list :post-data= '{{$post}}' >
        </comment-list>

		{{-- @foreach ($post->comments as $comment)
			<li>
				@include('comments.show')
			</li>
		@endforeach --}}
	</ol>
</section>