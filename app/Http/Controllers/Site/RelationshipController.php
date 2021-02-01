<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class RelationshipController extends Controller
{
    public function ajaxSendRequestFriend(Request $request)
    {
        $input = $request->all();
        $relationship = new Relationship();
        $relationship->sender_id = Auth::user()->id;
        $relationship->receiver_id = $input['receiver_id_request'];
        $relationship->status = '0';
        $relationship->action_user_id = $relationship->status;
        $relationship->save();
        return Response::json(['success_add_friend' => "addSuccessFriend"]);
    }
    public function ajaxFriend(Request $request)
    {
        $input = $request->all();
        $relationship = Relationship::find($input['relationship_id']);
        if(isset($input['status_accept'])){
            $relationship->status = $input['status_accept'];
            $relationship->action_user_id = $relationship->status;
        }
        if(isset($input['status_deny'])){
            $relationship->status = $input['status_deny'];
            $relationship->action_user_id = $relationship->status;
        }
        $relationship->update();
        return Response::json(['success_add' => "addSuccess", 'success_deny' => 'denySuccess']);
    }

    public function ajaxSearch(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('users')
                ->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('tel', 'like', '%' . $query . '%')
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $data = DB::table('users')
                ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                            <ul id="myUL">
                                <li><a href="/profile/'.$row->id.'/show">'.$row->id. ' ' . $row->name . ' ' . $row->email . ' ' . $row->tel . '</a></li>
                            </ul>
                            ';
                                    }
                                } else {
                                    $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

}
