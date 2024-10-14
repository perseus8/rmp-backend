<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Proposal;
use App\Models\ProposalItems;
use App\Models\ProposalLogistic;
use App\Models\ProposalPackingMaterial;
use App\Models\ProposalStretViewImages;
use App\Models\ProposalSummery;
use App\Models\ProposalTourPlan;
use App\Models\TransactionFee;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $proposalId = $request->invoiceid;

        if ($proposalId != null) {
            $proposalData = Proposal::where('proposals.id', $proposalId)->join('customers', 'customers.id', '=', 'proposals.customer_id')->get();
            $proposalTourPlan = ProposalTourPlan::with('image')->where('proposal_id', $proposalId)->get();
            $proposalImages = ProposalStretViewImages::where('proposal_id', $proposalId)->get();
            $propsoalPackingMaterials = ProposalPackingMaterial::where('proposal_id', $proposalId)
                ->join('packing_materials', 'packing_materials.id', '=', 'proposal_packing_materials.packing_material_id')->get();
            $proposalItems = ProposalTourPlan::has('items')->with('items',)->where('proposal_id', $proposalId)->get();
            $proposalLogistic = ProposalLogistic::where('proposal_id', $proposalId)->get();

            $proposalSummery = ProposalSummery::where('proposal_id', $proposalId)->get();

            // dd($proposalTourPlan);
            $sumChecked = 0;

            foreach ($proposalSummery as $summary) {
                foreach ($summary->getAttributes() as $key => $value) {

                    if (strpos($key, '_checked') !== false && $value == 1) {
                        $sumChecked++;
                    }
                }
            }

            if (
                count($proposalSummery) > 0 &&
                count($proposalItems) &&
                count($proposalLogistic) &&
                count($proposalData) &&
                count($proposalTourPlan)
            ) {

                // dd($proposalSummery);
                $dompdf = Pdf::loadView(
                    'Invoice.Invoice',
                    [
                        'proposalData' => $proposalData,
                        'proposalTourPlan' => $proposalTourPlan,
                        'propsoalPackingMaterials' => $propsoalPackingMaterials,
                        'proposalLogistic' => $proposalLogistic,
                        'proposalItems' => $proposalItems,
                        'proposalSummery' => $proposalSummery ?? [],
                        'sumChecked' => $sumChecked,
                        'proposalImages' => $proposalImages
                    ]
                );

                $dompdf->render();
                return $dompdf->stream('invoice.pdf');
            }
        }
    }
}
