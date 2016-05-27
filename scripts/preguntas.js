var pAnt;

function prClick(id)
{
    document.getElementById(id).hidden = false;    
    if(pAnt != null && pAnt!=id)
    {
        document.getElementById(pAnt).hidden = true;
    }    
    pAnt = id;
}