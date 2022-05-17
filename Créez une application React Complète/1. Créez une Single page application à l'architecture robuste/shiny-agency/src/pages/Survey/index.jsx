import { Link, useParams } from 'react-router-dom'

const Survey = () => {
  const { questionNumber } = useParams()
  const questionNumberInt = parseInt(questionNumber)
  const prev = questionNumberInt === 1 ? 1 : questionNumberInt - 1
  const next = questionNumberInt + 1
  return (
    <>
      <h1>Questionnaire 🧮</h1>
      <span>{questionNumber}</span>
      {questionNumberInt !== 1 && <Link to={`/survey/${prev}`}>Précédant</Link>}
      {
        questionNumberInt >= 10 ?
          <Link to={'/results'}>Résultats</Link>
          :
          <Link to={`/survey/${next}`}>Suivant</Link>
      }
    </>
  )
}

export default Survey
