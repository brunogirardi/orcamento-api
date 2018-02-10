<? php 

namespace App\Http\Resources;

use Illuminate\Http\Request;

class MyGenerico {

    public function static collection($json_var) {
        
        $data = new array($json_var);

        return response()->json($data);
    }

}
