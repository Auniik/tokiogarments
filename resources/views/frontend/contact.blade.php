@extends('frontend._partial.app')
@section('title', 'Contact Us')
@section('body')
  <!-- start office -->
<section class="address">
  <div class="container">
    <div class="row">
      <div class="row">
          <div class="col-md-4">
            <ul class="street-location">
              <h3>The Office,  {{$basic->title}}</h3>
              <p>{{$basic->address}}</p>
              <div class="fan-page">
               
                <div class="fb-page" data-href="{{$basic->facebook_page}}" data-tabs="timeline" data-width="350" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote  cite="{{$basic->facebook_page}}" class="fb-xfbml-parse-ignore"><a href="{{$basic->facebook_page}}"> {{$basic->title}}</a></blockquote></div>
              </div>
            </ul>
          </div>
          <!-- contact -->
          <div class="col-md-8">
           <div class="col-lg-12 qutoe-form-inner-le">

                     <form class="contact-form"  action="{{route('contact.send')}}" method="POST">
                         @csrf
                        <h2 class="column-title "><span>We are always ready</span> Request a call back</h2>
                        <div class="error-container"></div>
                        <div class="row">
                           <div class="col-lg-12">
                               @if( session()->has('success') )
                                   <div class="alert alert-success">{{ Session::get('success') }}</div>
                               @endif
                              <div class="form-group">
                                 <input class="form-control form-name {{($errors->has('name')) ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Full Name" type="text">
                                  @if($errors->has('name'))
                                      <div class="invalid-feedback">
                                          {{$errors->first('name')}}
                                      </div>
                                  @endif
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <input class="form-control form-email {{($errors->has('email')) ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" type="email">
                                  @if($errors->has('email'))
                                      <div class="invalid-feedback">
                                          {{$errors->first('email')}}
                                      </div>
                                  @endif
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <textarea class="form-control form-message required-field {{($errors->has('message')) ? 'is-invalid' : ''}}" id="message" placeholder="Comments" rows="8" name="message"></textarea>
                                  @if($errors->has('message'))
                                      <div class="invalid-feedback">
                                          {{$errors->first('message')}}
                                      </div>
                                  @endif
                              </div>
                           </div>
                           <!-- Col 12 end-->
                        </div>
                        <!-- Form row end-->
                        <div class="text-left">
                           <input type="submit" class="btn btn-primary tw-mt-30" value="Contact US">
                        </div>
                     </form>
                     <!-- Form end-->
               </div>
          </div>
      </div>
      
    </div>
  </div>
</section>
  <!-- end office -->

  <!-- map section -->
<div class="google-map">{!!  $basic->location !!}</div>

@endsection
