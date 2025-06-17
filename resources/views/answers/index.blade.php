@foreach ($answers as $index => $response)
  <div class="bg-white p-6 rounded-lg shadow">
    <h2 class="font-semibold text-lg mb-4">Lần trả lời {{ $index + 1 }}</h2>
    <ul class="space-y-2">
      @foreach ($response as $question => $answer)
        <li>
          <strong>{{ $question }}:</strong> {{ $answer }}
        </li>
      @endforeach
    </ul>
  </div>
@endforeach
