<div>
    <div>
        PHoto : {{ asset('service_images/'.$data['image']) }}
    </div>
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
        QR Code : <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($data['epic_no'])) !!} ">

    </div>
      
    
</div>
 

</div>
