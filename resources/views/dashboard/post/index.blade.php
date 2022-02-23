<table class="table">
    <thead class="text-primary">
        <tr>
            <th>
                Id
            </th>
            <th>
                Título
            </th>
            <th>
                Categoría
            </th>
            <th>
                Posteado
            </th>
            <th>
                Creación
            </th>
            <th>
                Actualización
            </th>
            <th>
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>
                    {{ $post->id }}
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->category->title }}
                </td>
                <td>
                    {{ $post->posted }}
                </td>
                <td>
                    {{ $post->created_at->format('d-m-Y') }}
                </td>
                <td>
                    {{ $post->updated_at->format('d-m-Y') }}
                </td>
                <td>
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary"><i
                            class="fa fa-edit"></i></a>
                    
                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $post->id }}"
                        class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
