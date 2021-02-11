<?php

namespace App\Http\Controllers;
use Response;
use App\Mail\SendMail;
use App\User;
use App\UserInvitation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class MailController extends Controller {

   public function basic_email(Request $request)
   {
      $rules = [
         'name' => 'required',
         'email' => 'required|email|unique:users',
      ];

      $customMessages = [
            'name.required' => 'Please provide your name.',
            'email.required' => 'Please provide your email.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'User with this email exist',
      ];

      $this->validate($request, $rules, $customMessages); 
    
      $recipients = [$request->email];

      //GENERATE TOKEN
      $token = $this->CreateToken();
      $url = $request->getHttpHost().'/userinvitaion?token='.$token;
      
      $contact = ['contact_email' => $request->email, 'contact_name' => $request->name, 'url' => $url];
      foreach($recipients as $recipient){
            Mail::to($recipient)->send(new SendMail($contact));
      }
      // $this->SaveToken($token, $email);

      return Response::json(['data' =>"Invitation Sent to DSP"]);

   }

   function CreateToken(){
      return bin2hex(random_bytes(50)); 
   }

   function SaveToken($token, $email, $name){
      $invitation = new UserInvitation();
      $invitation->inviter = Auth::id();
      $invitation->email = $email;
      $invitation->name = $name;
      $invitation->token = $token;
      $invitation->status = 0;
      $invitation->save();
   }

   public function html_email(Request $request) 
   {
      // return Response::json(['data' =>$request->all()]);
      $rules = array(
         'name' => 'required',
         'email' => 'required|email|unique:users|unique:user_invitation',
      );

      $customMessages = [
            'name.required' => 'Please provide your name.',
            'email.required' => 'Please provide your email.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'User with this email already exist.'
      ];

      $validator = validator::make ($request->all(), $rules);
      if($validator->fails()){
         return Response::json(array('errors' => $validator->getMessageBag()->toArray()));  
      }  
    
      //GENERATE TOKEN
      $token = $this->CreateToken();
      $url = $request->getHttpHost().'/userinvitaion?token='.$token;

      $contact = array('contact_email' => $request->email, 'contact_name' => $request->name, 'url' => $url);
      $to = $request->email;
      $name = $request->name;

      Mail::send('emails.mail', $contact, function($message) use($to, $name) {
         $message->to($to, $name)
         ->subject('INVITATION TO SIGNUP ON NATIONAL DOSEMETRY REGISTRY ONLINE APP');
         $message->from('Ndr@nnra.gov.ng','NNRA');
      });
      $this->SaveToken($token, $request->email, $name);
      return Response::json(['data' =>"Invitation Sent to DSP"]);
   }

   public function attachment_email() 
   {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}

// public function basic_email(Request $request)
// {
//    $rules = [
//       'name' => 'required',
//       'email' => 'required|email',
//       // 'phone' => 'required',
//       // 'message' => 'required',
//   ];

//   $customMessages = [
//       'name.required' => 'Please provide your name.',
//       'email.required' => 'Please provide your email.',
//       'email.email' => 'Please provide a valid email address.',
//       // 'phone.required' => 'Please provide your phone number.',
      // 'message.required' => 'Message can not be empty.'
//   ];

//   $this->validate($request, $rules, $customMessages); 

  //$secret_key = '6LfiRcoUAAAAALb0hbff_5j51mTq_vh5e5bQGWlj';
  //$response_key = $request->input("g-recaptcha-response");
  //$user_ip = "159.89.52.55";
  //$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip";

  //$response = file_get_contents($url);
  //$response = json_decode($response);

//   if($response->success){

 
   // $recipients = [$request->email];

   // $contact = ['contact_email' => $request->email, 'contact_name' => $request->name];
   // // , 'contact_message' => $request->message
   // foreach($recipients as $recipient){
   //       Mail::to($recipient)->send(new SendMail($contact));
   // }

   // notify()->success("We have received your message. We will get back to you via email or phone","","bottomRight");

   // $message = 1;
   // // return redirect()->route('contact')->with('message', $message);
   // return 'sent';

//   }
//   else{
//       notify()->error("Invalid captcha, please try again","Error","bottomRight");

//       return redirect()->back()->withInput();
//   }
   
   //   $to_name = 'Musa Dabra';
   //   $to_email = 'musadabra@gmail.com';
   //   $data = array('name'=>"Dr Zaheed", "body" => "This is a Test Email From Split pay.");
 
   //   Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
   //       $message->to($to_email, $to_name)->subject('Email Config Works!');$message->from('musadabra@gmail.com','SplitPay');
   //   });
// }

##########################
##### USEFULL REASOURCE ##
#  https://www.tutorialspoint.com/laravel/laravel_sending_email.htm