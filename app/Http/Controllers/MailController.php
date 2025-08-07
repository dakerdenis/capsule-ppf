<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        Log::info('📩 Received Contact Form Request', ['request_data' => $request->all()]);

        try {
            // ✅ Validate request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'number' => 'required|string|max:15',
                'countries' => 'required|string',
                'message' => 'required|string|max:1000',
            ]);

            Log::info('✅ Validation Passed', ['validated_data' => $validated]);

            // ✅ Setup PHPMailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0; // 🛠 Enable Debugging (Set to 0 for production)
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'form@capsuleppf.com'; // ✅ Authenticated Email
            $mail->Password = 'Troya@9977!@';  // ❗ MOVE THIS TO `.env` FILE
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // ✅ Set "From" and "Reply-To"
            $mail->setFrom('form@capsuleppf.com', 'Capsule Contact Form'); // ✅ Must match Username
            $mail->addReplyTo($validated['email'], $validated['name']); // ✅ Allow replies to user

            // ✅ Add recipient
            $mail->addAddress("contact@capsuleppf.com");

            // ✅ Email Content
            $mail->Subject = "New Contact Form Submission";
            $mail->isHTML(true);
            $mail->Body = "
                <h2>New Contact Request</h2>
                <p><strong>Name:</strong> {$validated['name']}</p>
                <p><strong>Email:</strong> {$validated['email']}</p>
                <p><strong>Phone Number:</strong> {$validated['number']}</p>
                <p><strong>Country:</strong> {$validated['countries']}</p>
                <p><strong>Message:</strong></p>
                <p>{$validated['message']}</p>
            ";

            // ✅ Send Email
            if (!$mail->send()) {
                throw new Exception('Mail Error: ' . $mail->ErrorInfo);
            }

            Log::info('✅ Email Sent Successfully');

            return response()->json(["success" => true, "message" => "Message sent successfully!"]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('❌ Validation Failed', ['errors' => $e->errors()]);
            return response()->json(["success" => false, "error" => "Validation failed", "details" => $e->errors()], 422);

        } catch (Exception $e) {
            Log::error('❌ Mail Sending Failed', ['error' => $e->getMessage()]);
            return response()->json(["success" => false, "error" => "Mail sending failed", "details" => $e->getMessage()], 500);
        }
    }
}
