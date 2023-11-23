<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeAmount;

class FeeAmountController extends Controller{

    public function ViewAmount(){

        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.amount.view_amount', $data);
    }

    public function FeeAmountAdd(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.amount.add_amount', $data);
    }

    public function FeeAmountStore(Request $request){

        $countClass = count($request->class_id);

        if ($countClass !=NULL){
            for($i=0; $i <$countClass ; $i++){
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];

                $fee_amount->save();
            }
        }

            $notification = array(
                'message' => 'Data Inserted successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('fee.amount.view')->with($notification);
    }

    public function FeeAmountEdit($fee_category_id){

        $data['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.amount.edit_amount', $data);
    }

     public function UpdateFeeAmount(Request $request,$fee_category_id){
        if ($request->class_id == NULL) {
       
        $notification = array(
            'message' => 'Sorry You do not select any class amount',
            'alert-type' => 'error'
        );

        return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
             
        }else{
             
    $countClass = count($request->class_id);
    FeeAmount::where('fee_category_id',$fee_category_id)->delete(); 
            for ($i=0; $i <$countClass ; $i++) { 
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            } // End For Loop    

        }// end Else

       $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    } // end Method 


    public function CategoryFeeDelete($id){

        $data = FeeAmount::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student fee Delete successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }
}
