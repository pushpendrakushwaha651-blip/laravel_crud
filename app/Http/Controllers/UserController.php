<?php
// http://127.0.0.1:8000 
namespace App\Http\Controllers;

use Illuminate\Http\Request;   
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showUsers() {
        $users = DB::table('students')->paginate(5);
        return view('allusers',['data'=> $users]);
    }

    public function singelUser(string $id) {
        $user = DB::table('students')->where('id', $id)->get();
        return view('singleuser',['data'=> $user]);
    }

    //  add new user 
    public function addUser(Request $request) {
        $pdfPath = null;
        if ($request->hasFile('userpdf')) {
            $pdfPath = $request->file('userpdf')->store('pdfs', 'public'); 
        }

        DB::table('students')->insert([
            'name'    => $request->username,
            'age'     => $request->userage,
            'email'   => $request->useremail,
            'address' => $request->useraddress,
            'city'    => $request->usercity,
            'phone'   => $request->userphone,
            'pdf'     => $pdfPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('home')->with('success', 'User added successfully!');
    }

    public function deleteUser($id) {
        $deleted = DB::table('students')->where('id', $id)->delete();
        return $deleted 
            ? redirect()->back()->with('success', 'User deleted successfully!') 
            : redirect()->back()->with('error', 'User not found!');
    }

    public function updatePage(string $id) {
        $user = DB::table('students')->where('id', $id)->first();
        return view('updateuser', ['data' => $user]);
    }

    public function updateUser(Request $req,$id) {
        $user = DB::table('students')
            ->where('id',$id)
            ->update([
                "name"      => $req->username,
                "age"       => $req->userage,
                "email"     => $req->useremail,
                "address"   => $req->useraddress,
                "city"      => $req->usercity,
                "phone"     => $req->userphone,
                "updated_at"=> now()
            ]);

        return $user
            ? redirect()->route('home')->with('success', 'User updated successfully!')
            : redirect()->route('home')->with('error', 'User not updated!');
    }

    public function search(Request $request) {
        $query = $request->get('search');

        $users = DB::table('students')
            ->where(function($q) use ($query) {
                $q->where('id', 'LIKE', "%{$query}%")
                  ->orWhere('name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%")
                  ->orWhere('city', 'LIKE', "%{$query}%")
                  ->orWhere('phone', 'LIKE', "%{$query}%");
            })
            ->get();

        $output = '';
        foreach ($users as $user) {
            $output .= '
            <tr>
                <td>'.$user->id.'</td>
                <td>'.$user->name.'</td>
                <td>'.$user->age.'</td>
                <td>'.$user->email.'</td>
                <td>'.$user->city.'</td>
                <td>'.$user->phone.'</td>
                <td>';
            if ($user->pdf) {
                $output .= '<a href="'.asset('storage/'.$user->pdf).'" target="_blank" class="btn btn-sm btn-secondary">View PDF</a>';
            } else {
                $output .= '<span class="text-muted">No PDF</span>';
            }
            $output .= '</td>
            </tr>';
        }

        return response($output);
    }
}
