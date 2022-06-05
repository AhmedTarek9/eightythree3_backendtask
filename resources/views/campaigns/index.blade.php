@include('layouts.header')
<p class="h2 d-flex justify-content-center">Advertising campaigns</p>
    <div class="container mx-auto">
  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <div class='w-full m-2 p-2'>
    <a href="{{route('campaigns.create')}}" type="button" class="btn btn-success">Create</a>
        </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">name</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">from</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">to</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">total</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">daily_budget</th>
            <th scope="col" class="relative text-center px-6 py-3">Mange</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($campaignss as $campaign)
          <tr>
          <td class="px-6 py-4 whitespace-nowrap counterCell"></td>
          <td  class="px-6 py-4 whitespace-nowrap">{{$campaign->name}}</a></td>
              <td class="px-6 py-4 whitespace-nowrap">{{$campaign->from}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$campaign->to}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$campaign->total}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$campaign->daily_budget}}</td>
            <td  class="px-8 py-6 text-right text-sm">
            <div class="flex justify-center">
            <a href="{{route('campaigns.show', $campaign->id) }}" type="button" class="btn btn-primary">View campaign image</a>
            &nbsp
            <a href="{{route('campaigns.edit', $campaign->id) }}" type="button" class="btn btn-success">Edit</a>
            </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="m-2 p-2">
      <div class="container">
{{ $campaignss->links() }}
      </div>
    </div>
  </div>
</div>
    </body>
</html>
