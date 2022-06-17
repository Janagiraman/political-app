<div>
    <div>
        Name : {{ $data['name'] }}
    </div>
    <div>
        Epic No: {{ $data['epic_no'] }}
    </div>
    <div>
        Age : {{ $data['age'] }}
    </div>
    <div>
        QR Code : <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('http://google.com')) !!} ">

    </div>
      
    <div class="visible-print text-center">
    <h1>Laravel 8 - QR Code Generator Example</h1>

    @php 
        print_r($qr_code);
    @endphp
     
    {{ QrCode::size(250)->generate('ItSolutionStuff.com'); }}
     
    <p>example by ItSolutionStuf.com.</p>
</div>
 

</div>
