@extends("layout")
@section("main")
    <div class="w-full relative flex flex-col md:flex-row md:justify-between">
        <div class="flex flex-col gap-5 md:ml-16">
            <div class="flex flex-col gap-5 text-left justify-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Contacts</h1>
                <p><span class="text-blue-900 font-bold">We’d Love to Hear From You!</span><br>
                Whether you have a question, need assistance with a project, or want to learn more about Inspa, our team is here to help. Reach out to us through the form below or use our contact details to get in touch directly.</p>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Our Office</h1>
                <p>Inspa Headquarters<br>123 Creative Avenue,<br>Design District, London, UK</p>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Get in Touch</h1>
                <p><span class="text-blue-900 font-bold">Phone:</span><br>
                +44 123 456 789</p>
                <p><span class="text-blue-900 font-bold">E-mail:</span><br>
                support@inspa.com</p>
            </div>
            <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Follow Us</h1>
                <p class="underline text-sm">Facebook</p>
                <p class="underline text-sm">Instagram</p>
                <p class="underline text-sm">Twitter</p>
                <p class="underline text-sm">LinkedIn</p>
            </div>
             <div class="flex flex-col gap-5 text-left md:max-w-[500px] py-5">
                <h1 class="decorative-font text-2xl lg:text-4xl">Join Our Community</h1>
                <p><span class="text-blue-900 font-bold">Stay Inspired. Stay Updated.</span>
                Join our community and be the first to know about exclusive design trends, new features, and special offers. Get inspiration delivered straight to your inbox!</p>
                <div class="flex max-w-[650px] input-btn w-full mt-5">
                    <input class="bg-white rounded-[1000px] w-full pl-5" type="text" placeholder="Your email">
                    <button class="blue-btn">Subscribe</button>
                </div>
            </div>
        </div>
        <div class="top-[-80px] right-0 xl:top-[-100px] xl:right-[0px] overflow:hidden z-1000">@livewire("animated-spinner")</div>

    </div>
@endsection