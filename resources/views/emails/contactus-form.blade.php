<!-- resources/views/emails/contact-form.blade.php -->

@component('mail::message')
# New Contact Form Submission

**Name:** {{ $formData['name'] }}<br>
**Email:** {{ $formData['email'] }}<br>

**Message:**
{{ $formData['textarea'] }}
@endcomponent
