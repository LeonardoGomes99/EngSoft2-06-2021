<table {{$attributes->merge(['class' => 'min-w-full divide-y divide-gray-200'])}}>
      <thead class="bg-gray-50">
        <tr>
            {{$heading}}
        </tr>
    </thead>
    <tbody class="bg-white">
        {{$body}}
    </tbody>
</table>
