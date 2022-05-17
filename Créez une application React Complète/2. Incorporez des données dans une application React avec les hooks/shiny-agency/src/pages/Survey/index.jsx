import { Link, useParams } from 'react-router-dom'
import { useContext } from 'react'
import styled from 'styled-components'
import colors from '../../utils/style/colors'
import { Loader } from '../../utils/style/Atoms'
import { SurveyContext } from '../../utils/context'
import { useFetch, useTheme } from '../../utils/hooks'


const SurveyContainer = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
`

const QuestionTitle = styled.h2`
  text-decoration: underline;
  text-decoration-color: ${colors.primary};
  color: ${({ theme }) => (theme === 'light' ? '#000000' : '#ffffff')};
`

const QuestionContent = styled.span`
  margin: 30px;
  color: ${({ theme }) => (theme === 'light' ? '#000000' : '#ffffff')};
`

const LinkWrapper = styled.div`
  padding-top: 30px;
  & a {
    color: ${({ theme }) => (theme === 'light' ? '#000000' : '#ffffff')};
  }
  & a:first-of-type {
    margin-right: 20px;
  }
`

const ReplyWrapper = styled.div`
  display: flex;
  flex-direction: row;
`

const ReplyBox = styled.button`
  border: none;
  height: 100px;
  width: 300px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: ${({ theme }) => theme === 'light' ? colors.backgroundLight : colors.backgroundDark};
  color: ${({ theme }) => (theme === 'light' ? '#000000' : '#ffffff')};
  border-radius: 30px;
  cursor: pointer;
  box-shadow: ${(props) =>
  props.isSelected ? `0px 0px 0px 2px ${colors.primary} inset` : 'none'};
  &:first-child {
    margin-right: 15px;
  }
  &:last-of-type {
    margin-left: 15px;
  }
`
const Survey = () => {
  const { data, isLoading, error } = useFetch('http://localhost:8000/survey')
  const { surveyData } = data
  const { questionNumber } = useParams()
  const { saveAnswers, answers } = useContext(SurveyContext)
  const questionNumberInt = parseInt(questionNumber)
  const prev = questionNumberInt === 1 ? 1 : questionNumberInt - 1
  const next = questionNumberInt + 1
  const { theme } = useTheme()

  const saveReply = (answer) => {
    saveAnswers({ [questionNumber]: answer })
  }

  if (error) {
    return <span>Oups, une erreur est survenue : {error}</span>
  }
  return (
    <SurveyContainer>
      <QuestionTitle theme={theme}>Question {questionNumber}</QuestionTitle>
      {isLoading ? (
        <Loader />
      ) : (
        <QuestionContent>{surveyData && surveyData[questionNumber]}</QuestionContent>
      )}
      {answers && (
        <ReplyWrapper>
          <ReplyBox
            onClick={() => saveReply(true)}
            isSelected={answers[questionNumber] === true}
            theme={theme}
          >
            Oui
          </ReplyBox>
          <ReplyBox
            onClick={() => saveReply(false)}
            isSelected={answers[questionNumber] === false}
            theme={theme}
          >
            Non
          </ReplyBox>
        </ReplyWrapper>
      )}
      <LinkWrapper theme={theme}>
        <Link to={`/survey/${prev}`}>Précédent</Link>
        {data[questionNumberInt + 1] ? (
          <Link to={`/survey/${next}`}>Suivant</Link>
        ) : (
          <Link to='/results'>Résultats</Link>
        )}
      </LinkWrapper>
    </SurveyContainer>
  )
}

export default Survey
