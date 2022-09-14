@component('mail::message')
# Introduction

The stock of the product <strong>{{$product->title}}</strong> is now <strong>{{$product->stock}}</strong>.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
