  <div class="section landing-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center">Keep in touch?</h2>
            <form class="contact-form" action="{{route('contact.store')}}">
              <div class="row">
                <div class="col-md-6 {{$errors->has('name') ? 'has-error' : ''}}">
                  <label>Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                     <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
                <div class="col-md-6 {{$errors->has('email') ? 'has-error' : ''}}">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
              </div>
              <label>Message</label>
              <textarea class="form-control {{$errors->has('message') ? 'has-error' : ''}}" name="message" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
              <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : ''}}</span>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                  <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>