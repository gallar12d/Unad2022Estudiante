<link
    href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
    rel="stylesheet"
/>

<div class="mx-10 pt-15">
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4
                class="mb-4 font-semibold text-gray-600 dark:text-gray-300"
            ></h4>
            <h1
                class="font-normal text-3xl text-grey-darkest leading-loose my-3 w-full"
            >
                Procedimiento: {{$procedimiento->nombre}}
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Listado de anexos
            </p>
        </div>
    </div>
</div>

<!-- component -->
<div>
    <div
        class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6"
    >
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    ></th>

                    <th
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Fecha
                    </th>

                    <th
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Descripción
                    </th>

                    <th
                        class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Link
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-xs divide-y divide-gray-200">
                @forelse($procedimiento->anexos as $anexo)
                <tr>
                    <td class="px-2 py-4 whitespace-nowrap"></td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$anexo->created_at}}
                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$anexo->descripcion}}
                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        <a target="_blank" href="{{asset('/public/archivos/anexos/'.$anexo->file)}}">
                            Ver
                        </a>
                    </td>
                </tr>

                @empty @endforelse

                <!-- More items... -->
            </tbody>
        </table>
    </div>
</div>
