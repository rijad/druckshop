
<div class="mycart">
    <div class="container"> 
        <div class="cart-form-shop w-100 contact-us">
            <p>Contact Us</p>
            <div class="map-overlay">
                 <iframe class="w-100"  height="250" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.6477771925347!2d76.84342981533737!3d30.72830089289693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f92df0c2b7c15%3A0x93c350ee212b77a5!2sDLF!5e0!3m2!1sen!2sin!4v1583494103605!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
			
            <div class="contact_location">
                <div class="w-35">
				@foreach ($contact as $key=>$cont)
                    <ul class="address">
                        <li>
                            <div><strong>Address:</strong><p>{{$cont->address_english}}</p> </div>
                           </li>
                        <li>
                            <div><strong>Call Us</strong><p>{{$cont->contact}}</p></div>
                        </li>
                        <li>
                            <div><strong>Email:</strong><p>{{$cont->email}}</p></div>
                        </li>
                    </ul>
				@endforeach
                </div>
            </div>
            <div class="form-contact">
                <div class="w-65">
                    <form >
                        <p class="contact-grey">Please fill your below details</p>
                         <div class="form-group">
                          <label for="text">Name:</label>
                          <input type="text" class="form-control" placeholder="enter here" >
                        </div>
                        <div class="form-group">
                          <label for="pwd">Subject:</label>
                          <input type="text" class="form-control" placeholder="enter here">
                        </div>
                        <div class="form-group w-100">
                          <label for="email">Message</label>
                          <textarea class="form-control">enter message</textarea>
                        </div>
                        <div class="form-group w-100 text-right">
                            <button class="continue_btn">Submit</button>
                        </div>
                    </form>
                </div>    
            </div>    
        </div>
    </div>
</div>    
