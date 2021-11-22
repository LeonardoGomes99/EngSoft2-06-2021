@props(['heading_background' => 'bg-gray-50'])
<table {{$attributes->merge(['class' => 'min-w-full divide-y divide-gray-200'])}}>
      <thead class="{{$heading_background}}">
        <tr>
            {{$heading}}
        </tr>
     </thead>
    <tbody class="bg-white">
        {{$body}}
    </tbody>
</table>
