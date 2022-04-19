<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

<div class="p-6 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 ">
    <!--Card 1-->
    <div class=" w-full lg:max-w-full lg:flex">
      
      <div class=" border-b border-t">
        <div class="mb-8">
          <p class="text-sm text-gray-600 flex items-center">
           
            Procedimiento:
          </p>
          <div class="text-gray-900 font-bold text-xl mb-2">{{$procedimiento->nombre}}</div>
          <p class="text-gray-700 text-base">{{$procedimiento->anotacion}}</p>
        </div>
        
      </div>
    </div>
   
  </div>
</div>

<!-- component -->
<div>
    <h2 class="text-center mt-2 mb-2">Actividades Realizadas</h2>
    <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-blue-400">
                <tr>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                    Orden</th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Actividad
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha inicio
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha fin
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Responsables
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-xs divide-y divide-gray-200">
                @php
                $i = 1;
                @endphp
                @forelse($actividades as $key => $a)
                @if($a->estado == 'Finalizada')
                <tr>
                   <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->orden}}
                        </td>

                        <td class="px-2 py-4 whitespace-nowrap">
                            {{$a->actividad}}

                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{$a->fecha_inicio}}


                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            {{$a->fecha_cierre}}


                        </td>
                        <td class="px-2 py-4 whitespace-nowrap">
                            <ul>
                                @forelse($a->responsables as $r)
                                <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                                @empty
                                @endforelse
                            </ul>

                        </td>
                </tr>
                @php
                $i++;
                @endphp

                @endif


                @empty

                @endforelse

                <!-- More items... -->
            </tbody>
        </table>
        <h2 class="mt-2 mb-2 ml-10"><strong>Total actividades realizadas</strong> {{$i - 1}}/{{$total_actividades}}</h2>
    </div>
</div>

<div>
    <h2 class="text-center mt-2 mb-2">Actividades aún con tiempo (mayor a 5 días de la fecha final)</h2>
    <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-green-500">
                <tr>
                <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                    Orden</th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Actividad
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha inicio
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha fin
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Responsables
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-xs divide-y divide-gray-200">
                @php
                $i = 1;
                @endphp
                @forelse($actividades as $key => $a)
                @if($a->estado != 'Finalizada')
                @php
                $diff = 0;
                $perc = 30;
                $f1 = new DateTime(date('Y-m-d'));
                $f2 = new DateTime($a->fecha_cierre);
                $diff = $f1->diff($f2);
                $diff = $diff->format('%R%a');

                @endphp
                @if( $diff > 5)

                <tr>

                    <td class="px-2 py-4 whitespace-nowrap">
                    {{$a->orden}}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->actividad}}

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_inicio}}


                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_cierre}}
                        <div class="h-4 relative max-w-xl rounded-full overflow-hidden">
                            <div class="w-full h-full bg-gray-200 absolute">
                            </div>
                            <div class="h-full bg-green-500 absolute" style="width:70%"><span class="ml-2 pb-2 text-center">{{$diff}}</span></div>
                        </div>

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        <ul>
                            @forelse($a->responsables as $r)
                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                            @empty
                            @endforelse
                        </ul>

                    </td>
                </tr>
                @php
                $i++;
                @endphp
                @endif



                @endif


                @empty

                @endforelse

                <!-- More items... -->
            </tbody>
        </table>
        <h2 class="mt-2 mb-2 ml-10"><strong>Total actividades con tiempo:</strong> {{$i - 1}}/{{$total_actividades}}</h2>
    </div>
</div>


<div>
    <h2 class="text-center mt-2 mb-2">Actividades próximas a vencer (3 a 5 días de la fecha final)</h2>
    <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-yellow-500">
                <tr>
                <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                    Orden</th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Actividad
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha inicio
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha fin
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Responsables
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-xs divide-y divide-gray-200">
                @php
                $i = 1;
                @endphp
                @forelse($actividades as $key => $a)
                @if($a->estado != 'Finalizada')
                @php
                $diff = 0;
                $perc = 30;
                $f1 = new DateTime(date('Y-m-d'));
                $f2 = new DateTime($a->fecha_cierre);
                $diff = $f1->diff($f2);
                $diff = $diff->format('%R%a');

                @endphp
                @if($diff >= 3 && $diff <= 5) <tr>

                    <td class="px-2 py-4 whitespace-nowrap">
                    {{$a->orden}}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->actividad}}

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_inicio}}


                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_cierre}}
                        <div class="h-4 relative max-w-xl rounded-full overflow-hidden">
                            <div class="w-full h-full bg-gray-200 absolute">
                            </div>
                            <div class="h-full bg-yellow-500 absolute" style="width:70%"><span class="ml-2 pb-2 text-center">{{$diff}}</span></div>
                        </div>

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        <ul>
                            @forelse($a->responsables as $r)
                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                            @empty
                            @endforelse
                        </ul>

                    </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif

                    @endif


                    @empty

                    @endforelse

                    <!-- More items... -->
            </tbody>
        </table>
        <h2 class="mt-2 mb-2 ml-10"><strong>Total actividades próximas a vencer:</strong> {{$i - 1}}/{{$total_actividades}}</h2>
    </div>
</div>

<div>
    <h2 class="text-center mt-2 mb-2">Actividades vencidas </h2>
    <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg m-6">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-red-500">
                <tr>
                <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                    Orden</th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Actividad
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha inicio
                    </th>
                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Fecha fin
                    </th>

                    <th class="px-2 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                        Responsables
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-xs divide-y divide-gray-200">
                @php
                $i = 1;
                @endphp
                @forelse($actividades as $key => $a)
                @if($a->estado != 'Finalizada')
                @php
                $diff = 0;
                $perc = 30;
                $f1 = new DateTime(date('Y-m-d'));
                $f2 = new DateTime($a->fecha_cierre);
                $diff = $f1->diff($f2);
                $diff = $diff->format('%R%a');

                @endphp
                @if($diff < 3) <tr>

                    <td class="px-2 py-4 whitespace-nowrap">
                    {{$a->orden}}
                    </td>

                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->actividad}}

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_inicio}}


                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        {{$a->fecha_cierre}}
                        <div class="h-4 relative max-w-xl rounded-full overflow-hidden">
                            <div class="w-full h-full bg-gray-200 absolute">
                            </div>
                            <div class="h-full bg-red-500 absolute" style="width:70%"><span class="ml-2 pb-2 text-center">{{$diff}}</span></div>
                        </div>

                    </td>
                    <td class="px-2 py-4 whitespace-nowrap">
                        <ul>
                            @forelse($a->responsables as $r)
                            <li>{{$r->usuario->primer_nombre}} {{$r->usuario->primer_apellido}} - {{$r->usuario->perfil->perfil}}</li>
                            @empty
                            @endforelse
                        </ul>

                    </td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif

                    @endif


                    @empty

                    @endforelse

                    <!-- More items... -->
            </tbody>
        </table>
        <h2 class="mt-2 mb-2 ml-10"><strong>Total actividades vencidas:</strong> {{$i - 1}}/{{$total_actividades}}</h2>
    </div>
</div>



<script>


</script>