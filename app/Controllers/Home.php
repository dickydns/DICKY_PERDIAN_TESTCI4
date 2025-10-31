<?php

namespace App\Controllers;
use App\Models\GuestVisitor;

class Home extends BaseController
{   
     public function __construct(){
        $this->guest_visitor = new GuestVisitor();
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function list(): string
    {
        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');

        if ($start && $end) {
            $query = $this->guest_visitor->where('DATE(created_at) >=', $start)->where('DATE(created_at) <=', $end)->orderBy('created_at', 'DESC')->findAll();
        } else{
            $query = $this->guest_visitor->orderBy('created_at', 'DESC')->findAll();
        }
        $Data['list'] = $query;
        $Data['start'] = $start;
        $Data['end']   = $end;
        return view('admin', $Data);
    }

    function submit_guest(){
        try{
            //input
            $name    = $this->request->getPost('name');
            $email   = $this->request->getPost('name');
            $message = $this->request->getPost('message');

            //validasi
            $validation = \Config\Services::validation();
            $validation->setRules([
                'name'    => 'required|min_length[5]|max_length[30]',
                'email'   => 'required|valid_email',
                'message' => 'required'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return redirect('/')->with('alert', 'Validasi bermasalah');
            }

            //buat data
            $create = $this->guest_visitor->insert([
                'name' => $name,
                'email'=> $email,
                'message' => $message
            ]);
        
            return redirect('/')->with('success', 'Berhasil Terdata');
        } catch(\Exception $e){
            return redirect('/')->with('alert', 'Server bermasalah');
        }
    }

    function export(){
        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');

        if ($start && $end) {
            $query = $this->guest_visitor->where('DATE(created_at) >=', $start)->where('DATE(created_at) <=', $end)->orderBy('created_at', 'DESC')->findAll();
        } else{
            $query = $this->guest_visitor->orderBy('created_at', 'DESC')->findAll();
        }

        $filennm = "Export-Guest-Visitor-".date('Y-m-d').".csv"; 
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filennm . '"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['No', 'Name', 'Email', 'Message', 'Created At']);
        foreach ($query as $num => $guest) {
            fputcsv($output, [
                $num+1,
                $guest['name'],
                $guest['email'],
                $guest['message'],
                $guest['created_at']
            ]);
        }
        fclose($output);
        exit(); 
    }
}
